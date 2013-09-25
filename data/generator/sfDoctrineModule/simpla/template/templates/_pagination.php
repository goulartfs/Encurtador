<div class="pagination">
  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">
    Primeira página
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">
    Anterior
  </a>

  [?php foreach ($pager->getLinks() as $page): ?]
      <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]" class="number [?php if ($page == $pager->getPage()): ?]current[?php endif; ?]">[?php echo $page ?]</a>
  [?php endforeach; ?]

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">
    Próxima
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">
    Última página
  </a>
</div>