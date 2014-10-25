<div class="pagination">
	<?php 	$i = 0; ?>
	<?php 	while($i < $number_pages): ?>
	<?php 	$i += 1; ?>
	<div>
	<?php if($i == $current_page): ?>
	<span><?php echo $i; ?></span>
	<?php else: ?>
	<a href="./?pg=<?php
		echo $i; 
		if(isset($_GET["tag"])) {
			echo "&tag=" . $_GET["tag"] ;
		}
		elseif(isset($_GET["searchterm"])) {
			echo "&searchterm=" . $_GET["searchterm"] ;
		}
		?>"><?php echo $i; ?></a>
	<?php endif; ?>
	</div>
	<?php 	endwhile; ?>
</div>