<!-- Header -->

<header id="header">
  <div class="logo"><a href="#">Real <span>Céllos</span></a></div>
  <a href="#menu">Menu</a> </header>
<!-- One -->

<section id="One" class="wrapper style3">
  <div class="inner">
    <header class="align-center">
      <p>Fale Conosco</p>
      <h2>Formulário de Contato</h2>
    </header>
  </div>
</section>
<section id="two" class="wrapper style2">
<div class="inner">
  <div class="box">
    <div class="content">
      <div align="center"> <br>
        <br>
        <form method="post" action="<?php echo site_url('paginas/contato') ?>">
          <div class="row uniform">
            <div class="6u 12u$(xsmall)">
              <input type="text" name="name" id="name" value="" placeholder="Nome">
            </div>
            <div class="6u$ 12u$(xsmall)">
              <input type="email" name="email" id="email" value="" placeholder="Email">
            </div>
            <!-- Break -->
            <div class="12u$">
              <div class="select-wrapper">
                <select name="category" id="category">
                  <option value="">- Categoria -</option>
                  <option value="Orcamento">Orçamento</option>
                  <option value="Duvida">Dúvida</option>
                  <option value="Suporte">Suporte</option>
                </select>
              </div>
            </div>
            
            <!-- Break -->
            <div class="4u 12u$(small)">
              <input type="radio" id="priority-low" name="priority" checked="">
              <label for="priority-low">Prioridade Baixa</label>
            </div>
            <div class="4u 12u$(small)">
              <input type="radio" id="priority-normal" name="priority">
              <label for="priority-normal">Prioridade Média</label>
            </div>
            <div class="4u$ 12u$(small)">
              <input type="radio" id="priority-high" name="priority">
              <label for="priority-high">Prioridade Alta</label>
            </div>
            <!-- Break --> 
            
            <!-- Break -->
            <div class="12u$">
              <textarea name="message" id="message" placeholder="Escreva sua mensagem" rows="6"></textarea>
            </div>
            <!-- Break -->
            <div class="12u$">
              <ul class="actions">
                <li>
                  <input type="submit" value="enviar">
                </li>
                <li>
                  <input type="reset" value="limpar" class="alt">
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
