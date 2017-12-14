<!-- Header -->

<header id="header">
  <div class="logo"><a href="index.html">Real <span>Céllos</span></a></div>
  <a href="#menu">Menu</a> </header>
  
<!-- One -->

<section id="One" class="wrapper style3">
  <div class="inner">
    <header class="align-center">
      <p>Serviços</p>
      <h2>Nossos Serviços</h2>
    </header>
  </div>
</section>
<section id="two" class="wrapper style2">
  <div class="inner">
    <div class="box">
      <div class="content">
         <?php foreach($servicos->result() as $item) : ?>     
          <header class="align-center">
           <h2><?php echo $item->titulo_servico ?></h2>
          <p><?php echo $item->descricao_servico ?></p>
         
        </header>        
         <?php endforeach; ?>
        <div class="6u 12u">    
            <?php foreach($servicos->result() as $item) : ?>     
          <h4><?php echo $item->titulo_servico ?></h4>
         
          <ul class="alt">
         
            <li><?php echo $item->descricao_servico ?></li>
          
          </ul>
         <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
