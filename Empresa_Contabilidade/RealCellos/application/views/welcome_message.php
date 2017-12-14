<!-- Banner -->

<section class="banner full">

  <?php foreach($banners->result() as $banner) : ?>
  
  <article>
  <img src="<?php echo base_url($banner->file)  ?>" alt="" />
    <div class="inner">
      <header>
        <p>Centro de negócios especialiado em Contabilidade</p>
        <h2>Bem vindo a Real Céllos</h2>
      </header>
    </div>
  </article>
  <?php endforeach; ?>

</section>

<!-- One -->
<section id="one" class="wrapper style2">
  <div class="inner">
    <div class="grid-style">
      <div>
        <div class="box">
          <div class="image fit"> <img src="images/slide03.jpg" /> </div>
          <div class="content">
            <header class="align-center">
              <p>Conheça nossos serviços</p>
              <h2>Contabilidade</h2>
            </header>
            <p> O nosso Escritório de Contabilidade possui um grande foco na qualidade dos serviços oferecidos, buscando a cada dia se tornar uma empresa de excelência na prestação de serviços contábeis, fiscais e trabalhistas.</p>
            <footer class="align-center"> <a href="<?php echo site_url('paginas/servicos') ?>" class="button alt">Saiba Mais</a> </footer>
          </div>
        </div>
      </div>
      <div>
        <div class="box">
          <div>
            <center>
              <img src="images/logo.png" width="320px" height="200px"/>
            </center>
          </div>
          <div class="content">
            <header class="align-center">
              <p>Nossa esquipe</p>
              <h2>Sobre</h2>
            </header>
            <p> A Real Céllos é um centro de negócios que busca ser referência em qualidade e excelência na prestação de Serviços Contábeis e de Consultorias Financeiras e Gerenciais da região. Através de uma estratégia focada na excelência do atendimento.</p>
            <footer class="align-center"> <a href="<?php echo site_url('paginas/sobre') ?>" class="button alt">Saiba Mais</a> </footer>
          </div>
        </div>
        <div class="box">
          <div class="content">
            <header class="align-center">
              <p>Fique por dentro do mercado de valores</p>
              <h2>Notícias</h2>
            </header>
            <p> Notícias sobre o Mercado Financeiro, movimentação das principais bolsas do mundo, além da cotação do dólar e dos principais indicadores econômicos.</p>
            <footer class="align-center"> <a href="<?php echo site_url('paginas/noticias') ?>" class="button alt">Saiba Mais</a> </footer>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style3">
  <div class="inner">
    <header class="align-center">
      <p>Conheça nossa empresa pela pequena tour na galeria abaixo</p>
      <h2>Escritório Real Céllos</h2>
    </header>
  </div>
</section>

<!-- Three -->
<section id="three" class="wrapper style2">
  <div class="inner">
    <header class="align-center">
      <p class="special">Nam vel ante sit amet libero scelerisque facilisis eleifend vitae urna</p>
      <h2>Morbi maximus justo</h2>
    </header>
    <div class="gallery">
      <?php foreach($images->result() as $img) : ?>
      <div>
        <div class="image fit"> <a href="#"><img src="<?php echo base_url($img->file) ?>" alt="<?=$img->caption ?>" /></a> </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
