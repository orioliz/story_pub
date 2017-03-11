</div>
<footer>
    
   <div class="panel panel-light">
       <div class="panel-body">
           <p class="text-muted">
           <?= $this->version; ?>
            - 
	<?= $this->title; ?>
            - Oriol Izquierdo </p>
	<?php if(isset($this->msg)){
		echo $this->msg;
	}?>
           
       </div>
  </div>
	
</footer>
</body>
</html>