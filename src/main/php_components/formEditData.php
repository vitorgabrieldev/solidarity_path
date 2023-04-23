
          <div class="containerMenuContent hidden">
            <h1 class="titleContent">Editar dados</h1>
            <hr>
            <div class="main-block">
                <h1>Informações</h1>
                <form id="formRegister" method="POST">
                  <hr>
                  <input type="text" name="name" id="nameInput" placeholder="Apelido" required/>
                  <input type="number" name="name" onchange="completeValueInputs()" id="CEPInput" placeholder="CEP" required/>
                  <input class="disabled" type="text" disabled name="name" id="cityInput" placeholder="Rua" required/>
                  <input class="disabled" type="text" disabled name="name" id="RAFInput" placeholder="Cidade" required/>
                  <hr>
                    <button type="submit">Salvar</button>
                </div>
                </form>
            </div>
        </div>

<script type="text/javascript">

        document.querySelector('#formRegister').addEventListener('submit', async(event) => {
           event.preventDefault();
           
           const objectData = {
             username: $('#nameInput').val(),
             cep: $('#CEPInput').val(),
             city: $('#cityInput').val(),
             raf: $('#RAFInput').val(),
           };

           processData(JSON.stringify(objectData));
        });

        function processData(DATA) {
            $.ajax({
                url : 'php/updateAccount.php',
                type : 'POST',
                data : {data:DATA},
                success : (data) => {
                    document.querySelector('.containerMenuContent').classList.add("hidden");
                },
                error : (data) => {
                    console.log(data);  
                },
            });
        };

        const completeValueInputs = async() => {
          let data = await requestAPIs($('#CEPInput').val());
          document.querySelector('#cityInput').value = "";
          document.querySelector('#RAFInput').value = "";
          if(data.rua&&data.city) {
            document.querySelector('#cityInput').value = data.rua;
            document.querySelector('#RAFInput').value = data.city;
          } else {
            document.querySelector('#cityInput').value = "";
            document.querySelector('#RAFInput').value = "";
          };
        };

    const requestAPIs = async(requestCEP) => {
            // -- | -- api locate -- | --
           if(requestCEP.length !== 8) {
            alert('Digite um CEP válido');
           } else {
              const url = `http://viacep.com.br/ws/${requestCEP}/json/`;
              const dataMain = await fetch(url);
              const datasEnd = await dataMain.json();
              if(datasEnd.hasOwnProperty('erro')) {
                alert('Digite um CEP válido');
              } else {
                let objectDATAS = {
                  'city': datasEnd.localidade,
                  'rua': datasEnd.logradouro,
                };
                return objectDATAS;
              };
           };
    };
</script>