<header>
    <div class="logo">
        
    </div>
    
    <div class="titulo">
        PROYECTO CSA
    </div>
    <div class="categoria">
        <?php
            if(isset($_SESSION['tipo'])) {
                print($_SESSION['tipo']);
            }
        ?>
    </div>
    <hr>
</header>