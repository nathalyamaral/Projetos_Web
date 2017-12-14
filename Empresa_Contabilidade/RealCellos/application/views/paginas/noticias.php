<!-- Header -->

<header id="header">
  <div class="logo"><a href="index.html">Real <span>Céllos</span></a></div>
  <a href="#menu">Menu</a> </header>

<!-- One -->

<section id="One" class="wrapper style3">
  <div class="inner">
    <header class="align-center">
      <p>Noticias</p>
      <h2>Noticias</h2>
    </header>
  </div>
</section>
<section id="two" class="wrapper style2">
  <div class="inner">
    <div class="box">
      <div class="content">
        <?php foreach($noticias->result() as $item) : ?>
        <header class="align-center">
          <h2><?php echo $item->titulo_noticia ?></h2>
         
        </header>
        <p> <?php echo $item->descricao_noticia ?></p>

     
      <?php endforeach; ?>
       </div>
    </div>
  </div>
</section>
