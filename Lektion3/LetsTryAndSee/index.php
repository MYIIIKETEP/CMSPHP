<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Single Page Application</title>
  <style>
    .hidden {
      display: none;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
<!-- Обычная форма которая отпровляет информацию -->
  <form id="loginform" method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" />
    <label for="password">Password</label>
    <input type="password" id="password" name="password" />
    <input type="submit" value="Submit" />
    <!-- Строка с ошибкой -->
    <p id="errorfield" class="error hidden">Wrong username or password</p>
  </form>
<!-- Ответочка которая изначально спрятана -->
  <div id="dashboard" class="hidden">
    <h1 id="oH1">Welcome</h1>
    <button id="getmessages">Get messages</button>
    <ul id="messagelist"></ul>
  </div>

  <script type="application/javascript">
    //Выбирает всю логин форму
    const loginForm = document.getElementById('loginform');
    //Выбираем Строку с ошибкой
    const errorField = document.getElementById('errorfield');
    //Выбираем то что должно появиться если логин успешен
    const dashboard = document.getElementById('dashboard');
    //Кнопка "получить ответ"
    const getmessagesBtn = document.getElementById('getmessages');
    //Выбираем заранее созданый лист
    const messageList = document.getElementById('messagelist');
    const ooH1 = document.getElementById("oH1");
    //Когда происходит нажатие на кнопку с типом submit
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      //забираем все данные из формы
      const formData = new FormData(loginForm);
      fetch('api.php?login', {
        method: 'POST',
        //показываем ПХП файлу что и откуда брать
        body: formData
      })
        .then(response => {
          if (!response.ok) {
            throw Error(response.statusText);
          }
          //Om det här är OK och allt stämmde
          return response.json();
        })
        //Utför detta om allt är ok
        .then(data => {
          console.log(data.lol);
          loginForm.classList.add('hidden');
          dashboard.classList.remove('hidden');
        })
        //annars visa felet
        .catch(err => {
          errorField.classList.remove('hidden');
        });
    });
    //på nya clicken
    getmessagesBtn.addEventListener('click', () => {
      fetch('api.php?message')
         //Отсюда мы ищем что нам найти и так как нам отправляют в JSON мы принимаем его в джейсон
        .then(response => response.json())
        
        .then(data => {
          data.messages.forEach(message => {
            const li = document.createElement('li');
            li.textContent = message;
            messageList.appendChild(li);
          });
        });
    });
  </script>
</body>
</html>