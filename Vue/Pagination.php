<?php 
function afficherPagination($nbPage) {
?>
<nav aria-label="Page navigation" class="col-lg-offset-5" >
  <ul class="pagination pagination-lg">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<=$nbPage;$i++) { ?>
    <li><a href="#" class="action"><?php echo $i ?></a></li>
    <?php } ?>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

<?php 
}
?>