-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 12-Set-2017 às 12:25
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thiagono_webshow`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `password`, `email`, `data`) VALUES
(1, 'admin@admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin', '2017-09-02 19:21:19'),


-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(10) NOT NULL,
  `file` text NOT NULL,
  `caption` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `file`, `caption`, `description`, `status`) VALUES
(1, 'uploads/slide01.jpg', 'Bem vindo a Real Céllos', 'Centro de negócios especializado em Contabilidade', 0),
(2, 'uploads/slide02.jpg', 'Contabilidade', 'Os melhores serviços.', 0),
(3, 'uploads/slide03.jpg', 'Notícias', 'Bolsa de valores atualizada', 0),
(4, 'uploads/slide04.jpg', 'Orçamento', 'Solicite um orçamento para sua empresa entrando em contato', 0),
(5, 'uploads/slide05.jpg', 'Fale conosco', 'Seu atendimento em primeiro lugar', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(1) NOT NULL DEFAULT '0',
  `site_logo` text,
  `email_contato` varchar(100) DEFAULT NULL,
  `link_twitter` varchar(100) DEFAULT NULL,
  `link_instagram` varchar(100) DEFAULT NULL,
  `link_facebook` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `site_logo`, `email_contato`, `link_twitter`, `link_instagram`, `link_facebook`) VALUES
(0, 'uploads/logo2.png', 'realcellos@gmail.com', 'https://twitter.com/login?lang', 'https://www.instagram.com/?hl=', 'https://pt-br.facebook.com/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `file` text NOT NULL,
  `caption` text NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `images`
--

INSERT INTO `images` (`id`, `file`, `caption`, `description`) VALUES
(9, 'uploads/pic01.jpg', 'img01', 'img01'),
(10, 'uploads/pic02.jpg', 'img02', 'img02'),
(11, 'uploads/pic03.jpg', 'img03', 'img03'),
(12, 'uploads/pic04.jpg', 'img04', 'img04'),
(13, 'uploads/pic05.jpg', 'img05', 'img05'),
(14, 'uploads/pic06.jpg', 'img06', 'img06'),
(15, 'uploads/pic07.jpg', 'img07', 'img07'),
(16, 'uploads/pic08.jpg', 'img08', 'img08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo_noticia` varchar(255) NOT NULL,
  `descricao_noticia` longtext NOT NULL,
  `autor_noticia` varchar(255) NOT NULL,
  `data_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo_noticia`, `descricao_noticia`, `autor_noticia`, `data_noticia`) VALUES
(4, 'Poupança continuará atrativa mesmo com mudança de regras, diz Anefac', 'As sucessivas quedas dos juros básicos da economia chegarão, nesta semana, ao bolso de quem investe na mais tradicional aplicação financeira do país. A redução esperada da taxa Selic para abaixo de 8,5% ao ano nesta quarta-feira (6) diminuirá os rendimentos da poupança. No entanto, a caderneta continuará um dos investimentos mais atrativos.\r\n\r\nSegundo a Associação Nacional dos Executivos de Finanças, Administração e Contabilidade (Anefac), o dinheiro investido na poupança continuará rendendo mais que a inflação, que está no nível mais baixo em quase 20 anos. “A queda da inflação e a isenção de Imposto de Renda levam a poupança a continuar atrativa”, explica o diretor-executivo da entidade, Miguel de Oliveira.\r\n\r\nTradicionalmente, a Anefac faz simulações em que compara o rendimento da poupança com o dos fundos de investimento, que diversificam as aplicações, mas cobram Imposto de Renda de 15?2,5% e taxa de administração. Segundo Oliveira, mesmo com a mudança nas regras, a caderneta, que é isenta de tributação, continuará a render mais que os fundos em quase todos os casos.\r\n\r\n“Apenas nos casos em que a taxa de administração for inferior a 1%, os fundos continuarão mais atrativos”, diz o diretor-executivo da Anefac. De acordo com ele, as simulações mais recentes mostram que a poupança leva vantagem em todos os prazos de aplicação.\r\n\r\nNova regra\r\n\r\nDe acordo com a última edição do boletim Focus, pesquisa semanal com instituições financeiras realizada pelo Banco Central, o Comitê de Política Monetária (Copom) deve reduzir a taxa Selic em 1 ponto percentual, de 9,25% para 8,25% ao ano. Pela regra em vigor desde maio de 2012, quando a Selic fica igual ou acima de 8,5% ao ano, a caderneta rende 6,27% ao ano (0,5% ao mês) mais a Taxa Referencial (TR), tipo de juro variável.\r\n\r\nAbaixo de 8,5% ao ano, a caderneta rende 70? taxa Selic. Caso os juros básicos realmente caiam para 8,25% ao ano, a poupança passará a render 5,78% ao ano. Mesmo com a diminuição do rendimento, o investidor não perderá dinheiro porque a inflação pelo Índice Nacional de Preços ao Consumidor Amplo (IPCA) estava em 2,71% no acumulado de 12 meses terminados em julho.\r\n\r\nOliveira, no entanto, faz um alerta. Não necessariamente todo o saldo da poupança passará a ser corrigido pelo novo cálculo. Os depósitos feitos até 3 de maio de 2012, data em que foi publicada a medida provisória que alterou os rendimentos da poupança, continuarão a render 6,27% ao ano mais a TR, independentemente da taxa Selic em vigor. “A nova regra tem um efeito diferente para cada um. Os extratos da poupança mostram a parcela dos depósitos corrigidos pela regra antiga e pela regra atual”, disse.\r\n\r\nO diretor da Anefac esclarece que, na época, o governo precisou mudar o cálculo do rendimento da poupança para evitar um desequilíbrio no mercado financeiro. Caso a poupança continuasse a render pela regra antiga, ninguém aplicaria nos fundos de investimento quando a Selic caísse abaixo de 8,5% ao ano. Como os fundos são um dos principais compradores de títulos públicos federais, o governo correria o risco de não conseguir vender os papéis no mercado e não conseguir dinheiro para rolar (renovar) a dívida pública.', 'teste', '2017-09-12 01:13:59'),
(5, 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce hendrerit magna in sem malesuada accumsan. In consectetur ut metus sit amet blandit. Pellentesque condimentum, tellus sed suscipit consequat, ex ante scelerisque erat, sit amet tincidunt urna risus eget magna. Nam vel convallis sapien. Donec sapien massa, lacinia vel accumsan nec, pulvinar vel ante. Sed eget consectetur enim. Vivamus odio libero, vehicula volutpat orci ut, tempus dapibus diam. Suspendisse sollicitudin nulla erat, vehicula luctus sapien eleifend in. Quisque rhoncus orci lorem, quis tempus ex eleifend ut. Duis pulvinar a nisl vel elementum. Donec lorem diam, semper vitae posuere at, bibendum eget velit. Cras suscipit porta mattis.\r\n\r\nCras sollicitudin nunc id lorem vulputate mattis. Donec eu magna non diam fringilla eleifend ac quis dui. Aliquam ac interdum justo. Vivamus finibus ullamcorper orci sed aliquet. Aliquam ac luctus urna. Ut lobortis pellentesque eros vitae tincidunt. Praesent sodales vehicula tempor.\r\n\r\nVestibulum vehicula mauris eu tellus fringilla tristique sit amet a erat. Sed pretium dignissim suscipit. Morbi sed pretium odio. Maecenas tempus, ante et aliquam tempus, risus risus viverra mauris, nec consectetur mauris nibh eu orci. Donec convallis, augue nec eleifend eleifend, lorem mauris convallis diam, non aliquam velit libero et enim. Integer quis dignissim justo, pellentesque lacinia quam. Duis tristique nulla velit, eu pulvinar lectus pellentesque non. Sed lacinia lectus lorem, sit amet congue nunc sollicitudin quis. Phasellus dignissim elit ultrices nibh placerat porta. Phasellus eleifend, lacus sit amet vestibulum suscipit, nunc metus luctus lacus, rhoncus laoreet lectus nisi et eros. Pellentesque erat magna, pretium quis lorem quis, elementum porttitor ante. Vivamus laoreet facilisis leo, eget porttitor lorem posuere nec. Nullam nec nibh feugiat, rhoncus felis quis, efficitur mauris.', 'teste', '2017-09-12 01:23:21'),
(6, 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce hendrerit magna in sem malesuada accumsan. In consectetur ut metus sit amet blandit. Pellentesque condimentum, tellus sed suscipit consequat, ex ante scelerisque erat, sit amet tincidunt urna risus eget magna. Nam vel convallis sapien. Donec sapien massa, lacinia vel accumsan nec, pulvinar vel ante. Sed eget consectetur enim. Vivamus odio libero, vehicula volutpat orci ut, tempus dapibus diam. Suspendisse sollicitudin nulla erat, vehicula luctus sapien eleifend in. Quisque rhoncus orci lorem, quis tempus ex eleifend ut. Duis pulvinar a nisl vel elementum. Donec lorem diam, semper vitae posuere at, bibendum eget velit. Cras suscipit porta mattis.\r\n\r\nCras sollicitudin nunc id lorem vulputate mattis. Donec eu magna non diam fringilla eleifend ac quis dui. Aliquam ac interdum justo. Vivamus finibus ullamcorper orci sed aliquet. Aliquam ac luctus urna. Ut lobortis pellentesque eros vitae tincidunt. Praesent sodales vehicula tempor.\r\n\r\nVestibulum vehicula mauris eu tellus fringilla tristique sit amet a erat. Sed pretium dignissim suscipit. Morbi sed pretium odio. Maecenas tempus, ante et aliquam tempus, risus risus viverra mauris, nec consectetur mauris nibh eu orci. Donec convallis, augue nec eleifend eleifend, lorem mauris convallis diam, non aliquam velit libero et enim. Integer quis dignissim justo, pellentesque lacinia quam. Duis tristique nulla velit, eu pulvinar lectus pellentesque non. Sed lacinia lectus lorem, sit amet congue nunc sollicitudin quis. Phasellus dignissim elit ultrices nibh placerat porta. Phasellus eleifend, lacus sit amet vestibulum suscipit, nunc metus luctus lacus, rhoncus laoreet lectus nisi et eros. Pellentesque erat magna, pretium quis lorem quis, elementum porttitor ante. Vivamus laoreet facilisis leo, eget porttitor lorem posuere nec. Nullam nec nibh feugiat, rhoncus felis quis, efficitur mauris.', 'teste', '2017-09-12 01:23:34'),
(7, 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce hendrerit magna in sem malesuada accumsan. In consectetur ut metus sit amet blandit. Pellentesque condimentum, tellus sed suscipit consequat, ex ante scelerisque erat, sit amet tincidunt urna risus eget magna. Nam vel convallis sapien. Donec sapien massa, lacinia vel accumsan nec, pulvinar vel ante. Sed eget consectetur enim. Vivamus odio libero, vehicula volutpat orci ut, tempus dapibus diam. Suspendisse sollicitudin nulla erat, vehicula luctus sapien eleifend in. Quisque rhoncus orci lorem, quis tempus ex eleifend ut. Duis pulvinar a nisl vel elementum. Donec lorem diam, semper vitae posuere at, bibendum eget velit. Cras suscipit porta mattis. Cras sollicitudin nunc id lorem vulputate mattis. Donec eu magna non diam fringilla eleifend ac quis dui. Aliquam ac interdum justo. Vivamus finibus ullamcorper orci sed aliquet. Aliquam ac luctus urna. Ut lobortis pellentesque eros vitae tincidunt. Praesent sodales vehicula tempor. Vestibulum vehicula mauris eu tellus fringilla tristique sit amet a erat. Sed pretium dignissim suscipit. Morbi sed pretium odio. Maecenas tempus, ante et aliquam tempus, risus risus viverra mauris, nec consectetur mauris nibh eu orci. Donec convallis, augue nec eleifend eleifend, lorem mauris convallis diam, non aliquam velit libero et enim. Integer quis dignissim justo, pellentesque lacinia quam. Duis tristique nulla velit, eu pulvinar lectus pellentesque non. Sed lacinia lectus lorem, sit amet congue nunc sollicitudin quis. Phasellus dignissim elit ultrices nibh placerat porta. Phasellus eleifend, lacus sit amet vestibulum suscipit, nunc metus luctus lacus, rhoncus laoreet lectus nisi et eros. Pellentesque erat magna, pretium quis lorem quis, elementum porttitor ante. Vivamus laoreet facilisis leo, eget porttitor lorem posuere nec. Nullam nec nibh feugiat, rhoncus felis quis, efficitur mauris.', 'teste', '2017-09-12 09:14:59'),
(8, 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce hendrerit magna in sem malesuada accumsan. In consectetur ut metus sit amet blandit. Pellentesque condimentum, tellus sed suscipit consequat, ex ante scelerisque erat, sit amet tincidunt urna risus eget magna. Nam vel convallis sapien. Donec sapien massa, lacinia vel accumsan nec, pulvinar vel ante. Sed eget consectetur enim. Vivamus odio libero, vehicula volutpat orci ut, tempus dapibus diam. Suspendisse sollicitudin nulla erat, vehicula luctus sapien eleifend in. Quisque rhoncus orci lorem, quis tempus ex eleifend ut. Duis pulvinar a nisl vel elementum. Donec lorem diam, semper vitae posuere at, bibendum eget velit. Cras suscipit porta mattis. Cras sollicitudin nunc id lorem vulputate mattis. Donec eu magna non diam fringilla eleifend ac quis dui. Aliquam ac interdum justo. Vivamus finibus ullamcorper orci sed aliquet. Aliquam ac luctus urna. Ut lobortis pellentesque eros vitae tincidunt. Praesent sodales vehicula tempor. Vestibulum vehicula mauris eu tellus fringilla tristique sit amet a erat. Sed pretium dignissim suscipit. Morbi sed pretium odio. Maecenas tempus, ante et aliquam tempus, risus risus viverra mauris, nec consectetur mauris nibh eu orci. Donec convallis, augue nec eleifend eleifend, lorem mauris convallis diam, non aliquam velit libero et enim. Integer quis dignissim justo, pellentesque lacinia quam. Duis tristique nulla velit, eu pulvinar lectus pellentesque non. Sed lacinia lectus lorem, sit amet congue nunc sollicitudin quis. Phasellus dignissim elit ultrices nibh placerat porta. Phasellus eleifend, lacus sit amet vestibulum suscipit, nunc metus luctus lacus, rhoncus laoreet lectus nisi et eros. Pellentesque erat magna, pretium quis lorem quis, elementum porttitor ante. Vivamus laoreet facilisis leo, eget porttitor lorem posuere nec. Nullam nec nibh feugiat, rhoncus felis quis, efficitur mauris.', 'teste', '2017-09-12 09:15:13'),
(9, 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce hendrerit magna in sem malesuada accumsan. In consectetur ut metus sit amet blandit. Pellentesque condimentum, tellus sed suscipit consequat, ex ante scelerisque erat, sit amet tincidunt urna risus eget magna. Nam vel convallis sapien. Donec sapien massa, lacinia vel accumsan nec, pulvinar vel ante. Sed eget consectetur enim. Vivamus odio libero, vehicula volutpat orci ut, tempus dapibus diam. Suspendisse sollicitudin nulla erat, vehicula luctus sapien eleifend in. Quisque rhoncus orci lorem, quis tempus ex eleifend ut. Duis pulvinar a nisl vel elementum. Donec lorem diam, semper vitae posuere at, bibendum eget velit. Cras suscipit porta mattis. Cras sollicitudin nunc id lorem vulputate mattis. Donec eu magna non diam fringilla eleifend ac quis dui. Aliquam ac interdum justo. Vivamus finibus ullamcorper orci sed aliquet. Aliquam ac luctus urna. Ut lobortis pellentesque eros vitae tincidunt. Praesent sodales vehicula tempor. Vestibulum vehicula mauris eu tellus fringilla tristique sit amet a erat. Sed pretium dignissim suscipit. Morbi sed pretium odio. Maecenas tempus, ante et aliquam tempus, risus risus viverra mauris, nec consectetur mauris nibh eu orci. Donec convallis, augue nec eleifend eleifend, lorem mauris convallis diam, non aliquam velit libero et enim. Integer quis dignissim justo, pellentesque lacinia quam. Duis tristique nulla velit, eu pulvinar lectus pellentesque non. Sed lacinia lectus lorem, sit amet congue nunc sollicitudin quis. Phasellus dignissim elit ultrices nibh placerat porta. Phasellus eleifend, lacus sit amet vestibulum suscipit, nunc metus luctus lacus, rhoncus laoreet lectus nisi et eros. Pellentesque erat magna, pretium quis lorem quis, elementum porttitor ante. Vivamus laoreet facilisis leo, eget porttitor lorem posuere nec. Nullam nec nibh feugiat, rhoncus felis quis, efficitur mauris.', 'teste', '2017-09-12 09:15:31'),
(10, 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce hendrerit magna in sem malesuada accumsan. In consectetur ut metus sit amet blandit. Pellentesque condimentum, tellus sed suscipit consequat, ex ante scelerisque erat, sit amet tincidunt urna risus eget magna. Nam vel convallis sapien. Donec sapien massa, lacinia vel accumsan nec, pulvinar vel ante. Sed eget consectetur enim. Vivamus odio libero, vehicula volutpat orci ut, tempus dapibus diam. Suspendisse sollicitudin nulla erat, vehicula luctus sapien eleifend in. Quisque rhoncus orci lorem, quis tempus ex eleifend ut. Duis pulvinar a nisl vel elementum. Donec lorem diam, semper vitae posuere at, bibendum eget velit. Cras suscipit porta mattis. Cras sollicitudin nunc id lorem vulputate mattis. Donec eu magna non diam fringilla eleifend ac quis dui. Aliquam ac interdum justo. Vivamus finibus ullamcorper orci sed aliquet. Aliquam ac luctus urna. Ut lobortis pellentesque eros vitae tincidunt. Praesent sodales vehicula tempor. Vestibulum vehicula mauris eu tellus fringilla tristique sit amet a erat. Sed pretium dignissim suscipit. Morbi sed pretium odio. Maecenas tempus, ante et aliquam tempus, risus risus viverra mauris, nec consectetur mauris nibh eu orci. Donec convallis, augue nec eleifend eleifend, lorem mauris convallis diam, non aliquam velit libero et enim. Integer quis dignissim justo, pellentesque lacinia quam. Duis tristique nulla velit, eu pulvinar lectus pellentesque non. Sed lacinia lectus lorem, sit amet congue nunc sollicitudin quis. Phasellus dignissim elit ultrices nibh placerat porta. Phasellus eleifend, lacus sit amet vestibulum suscipit, nunc metus luctus lacus, rhoncus laoreet lectus nisi et eros. Pellentesque erat magna, pretium quis lorem quis, elementum porttitor ante. Vivamus laoreet facilisis leo, eget porttitor lorem posuere nec. Nullam nec nibh feugiat, rhoncus felis quis, efficitur mauris.', 'teste', '2017-09-12 09:15:47'),
(11, 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce hendrerit magna in sem malesuada accumsan. In consectetur ut metus sit amet blandit. Pellentesque condimentum, tellus sed suscipit consequat, ex ante scelerisque erat, sit amet tincidunt urna risus eget magna. Nam vel convallis sapien. Donec sapien massa, lacinia vel accumsan nec, pulvinar vel ante. Sed eget consectetur enim. Vivamus odio libero, vehicula volutpat orci ut, tempus dapibus diam. Suspendisse sollicitudin nulla erat, vehicula luctus sapien eleifend in. Quisque rhoncus orci lorem, quis tempus ex eleifend ut. Duis pulvinar a nisl vel elementum. Donec lorem diam, semper vitae posuere at, bibendum eget velit. Cras suscipit porta mattis. Cras sollicitudin nunc id lorem vulputate mattis. Donec eu magna non diam fringilla eleifend ac quis dui. Aliquam ac interdum justo. Vivamus finibus ullamcorper orci sed aliquet. Aliquam ac luctus urna. Ut lobortis pellentesque eros vitae tincidunt. Praesent sodales vehicula tempor. Vestibulum vehicula mauris eu tellus fringilla tristique sit amet a erat. Sed pretium dignissim suscipit. Morbi sed pretium odio. Maecenas tempus, ante et aliquam tempus, risus risus viverra mauris, nec consectetur mauris nibh eu orci. Donec convallis, augue nec eleifend eleifend, lorem mauris convallis diam, non aliquam velit libero et enim. Integer quis dignissim justo, pellentesque lacinia quam. Duis tristique nulla velit, eu pulvinar lectus pellentesque non. Sed lacinia lectus lorem, sit amet congue nunc sollicitudin quis. Phasellus dignissim elit ultrices nibh placerat porta. Phasellus eleifend, lacus sit amet vestibulum suscipit, nunc metus luctus lacus, rhoncus laoreet lectus nisi et eros. Pellentesque erat magna, pretium quis lorem quis, elementum porttitor ante. Vivamus laoreet facilisis leo, eget porttitor lorem posuere nec. Nullam nec nibh feugiat, rhoncus felis quis, efficitur mauris.', 'teste', '2017-09-12 09:16:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `titulo_servico` varchar(255) NOT NULL,
  `descricao_servico` longtext NOT NULL,
  `data_servico` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `titulo_servico`, `descricao_servico`, `data_servico`) VALUES
(1, 'teste', 'teste', '2017-09-11 03:27:41'),
(2, 'teste', 'teste', '2017-09-11 13:29:40'),
(3, 'teste', 'teste', '2017-09-11 13:30:06'),
(4, 'teste', 'teste', '2017-09-11 13:30:17'),
(5, 'teste', 'teste', '2017-09-11 13:30:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
