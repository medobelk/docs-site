<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
  </head>
  <style>
    header.section, footer.section{
      padding: 24px;
      background-color: #58647c;
    }
    .logo{
      font-family: 'Roboto Condensed', sans-serif;
      font-size: 18px;
    }
    .logo-left{
      color: #00DD1B;
    }
    .logo-right{
      color: #63C9E2;
    }
    a{
      color: white;
      font-family: 'Roboto Condensed', sans-serif;
      font-size: 1em;
      
    }
    .nav a{
      border-bottom: 1px solid white;
      margin-bottom: 5px;
      margin-right: 5px;
    }
    .nav a:hover, .logout:hover{
      color: white;
      border-bottom: none;
    }
    section.section{
      background-color: #E4E4E4;
    }
    form{
      display: inline;
    }
  </style>
  <body>
    <header class="section">
      <div class="container">
        <div class="columns" style="justify-content: center;">
            <div class="column is-2 has-text-centered">
              <a class="logo"><b class="logo-left">doc</b><b class="logo-right">Urolog</b></a>
            </div>
          <div class="column nav is-6 has-text-left" >
            
            <a href="">Записать</a>
            <a href="">Вопросы</a>
            <a href="">Отзывы</a>
            <a href="">Прием</a>
            <a href="">События</a>
            <a href="">Пациенты</a>
            <form>
              <a href="" class="logout" style="margin-left: 20px;">Выход</a>
            </form>
          </div>
        </div>
      </div>
    </header>
    <section class="section">
      <div class="container">
        <div class="block" >
          <div class="columns" style="justify-content: center;">
            <div class="column is-2"></div>
            <div class="column is-4">
              <div>
                <p>Ф.И.О.</p>
                <p>Калина Килина Калина</p>
              </div>
              <div>
                <p>Электронный Адрес</p>
                <p>addressEmail@email.inweb</p>
              </div>
              <div>
                <p>Дата Рождения</p>
                <p>12.12.2012</p>
              </div>
              <div>
                <p>Жалобы</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed fuga consequatur eveniet suscipit explicabo unde debitis. Amet accusamus, quod incidunt doloremque aspernatur laborum aut magni harum odit optio enim explicabo quibusdam repellendus in, unde voluptatum dolor assumenda impedit voluptatem quis non rerum similique sed minus. Nisi ex dolorum et natus temporibus eos velit accusantium eveniet, ea voluptas nesciunt, exercitationem nam, aliquid quod earum reiciendis quasi sequi incidunt odio totam. Vel praesentium consequuntur aut quo facilis, laborum magnam soluta. Unde molestias officia excepturi ipsa incidunt magni necessitatibus, enim, mollitia quos voluptatum autem iure, eveniet dolor ut eligendi hic repellendus. Rem nemo eum provident sunt odit consequatur at repudiandae, est ex ab aut, molestias fugit quod dicta molestiae assumenda fuga. Ullam, iste.</p>
              </div>
              <a href="">Редактировать</a>
            </div>
            <div class="column is-2 has-text-left">
              <input type="text" name="">
              <a>Lorem ipsum dolor sit amet.</a>
              <a>Lorem ipsum dolor sit amet.</a>
              <a>Lorem ipsum dolor sit amet.</a>
              <a>Lorem ipsum dolor sit amet.</a>
              <a>Lorem ipsum dolor sit amet.</a>
            </div>
          </div>
        </div>
        <!-- <div class="sidebar"></div> -->
      </div>
    </section>
    <footer class="section">
      <div class="container is-clearfix" style="width: 50%; color: white;">
        <span class="is-pulled-left">2017 © docurolog</span>
        <span class="is-pulled-right">дизайн и поддержка сайтаKatrin Briz</span>
      </div>
    </footer>
  </body>
</html>