  <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="//<?php echo $_SERVER['SERVER_NAME']; ?>">
           Bargamify.com
          </a>
          <ul class="nav">
            <li>
              <a href="/index.php">
                Home
              </a>
            </li>
            
          </ul>
          <?php if(!is_null($this->pnlLogin)){ 
          	$this->pnlLogin->Render(); 
          } ?>   
          
          
        </div>
      </div>
    </div>
    <div class="container">