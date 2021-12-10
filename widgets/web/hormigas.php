<?php 
?>


<div class="row " id="row-fill">
    <h1>ey</h1>
</div>
<div class="row " id="row-fill">
    <h1>ey</h1>
</div>

<form action='hormigas.php' enctype='multipart/form-data' class='form-post' method='post'>

<div class="row  justify-content-start" id="title-row">
    <div class="col-1"></div>
    <div class="col-7">
        <h1>Especies de hormigas</h1>
    </div>

    <div class="col-2">
        <select class="form-select form-select-lg mb-3" id="filter" name="filter" aria-label=".form-select-lg example">

            <?php
            $conn = connectDB();
            $consulta = "select * from ants ";
            
            if(isset($_POST["filter"]) && $_POST["filter"]!=""){
                if($_POST["filter"] == "Facil"){
                    echo "<option value='Todas'>Todas</option>
                    <option selected value='Facil'>Facil</option>
                    <option value='Normal'>Normal</option>
                    <option value='Dificil'>Dificil</option>
                    <option value='Extrema'>Extrema</option>";
                    $consulta = "select * from ants where care = 'Facil'";
                }else if($_POST["filter"] == "Normal"){
                    echo "<option value='Todas'>Todas</option>
                    <option  value='Facil'>Facil</option>
                    <option selected value='Normal'>Normal</option>
                    <option value='Dificil'>Dificil</option>
                    <option value='Extrema'>Extrema</option>";
                    $consulta = "select * from ants where care = 'Normal'";
                }else if($_POST["filter"] == "Dificil"){
                    echo "<option value='Todas'>Todas</option>
                    <option  value='Facil'>Facil</option>
                    <option  value='Normal'>Normal</option>
                    <option selected value='Dificil'>Dificil</option>
                    <option value='Extrema'>Extrema</option>";
                    $consulta = "select * from ants where care = 'Dificil'";
                }else if($_POST["filter"] == "Extrema"){
                    echo "<option value='Todas'>Todas</option>
                    <option  value='Facil'>Facil</option>
                    <option  value='Normal'>Normal</option>
                    <option value='Dificil'>Dificil</option>
                    <option selected value='Extrema'>Extrema</option>";
                    $consulta = "select * from ants where care = 'Extrema'";
                }else{
                    echo "<option selected value='Todas'>Todas</option>
                    <option  value='Facil'>Facil</option>
                    <option value='Normal'>Normal</option>
                    <option value='Dificil'>Dificil</option>
                    <option value='Extrema'>Extrema</option>";
                }
            }else{
                echo "<option selected value='Todas'>Todas</option>
                <option  value='Facil'>Facil</option>
                <option value='Normal'>Normal</option>
                <option value='Dificil'>Dificil</option>
                <option value='Extrema'>Extrema</option>";
            }

            // ejecuta una consulta en la DB
            $rs = mysqli_query($conn, $consulta);
            //close conexion
            mysqli_close($conn);
            ?>
        </select>
    </div>

    <div class="col-1"><input type='submit' id='btn-Publicar' class='btn btn-primary' value='Ver'></div>
    <div class="col-1"></div>
</div>
</form>

<?php
    $cont =0;
    $firstRow = 0;
    if(mysqli_num_rows($rs)>0){

        echo "
        <div class='p-5' style='margin:0 !important; ' id='container-modals-ants'>
            <div class='d-flex align-content-center flex-wrap p-5' id='container-modals-ants' >";

        while($info_ant= mysqli_fetch_array($rs)){

            ?>
<div class='col-sm-4 m-5 p-2' style='width:400px' id='container-content'>

    <div class='row'>

        <div class="row p-5 ">
            <img id='ant-photo' src='../general/show-photo-ants.php?idAnt=<?=$info_ant['id_ant']?>'
                alt='<?=$info_ant['name']?>'>
        </div>

        <div class="row text-center  text-capitalize">
            <h4 class='display-6'><?=$info_ant["name"]?></h4>
        </div>

        <div class=" d-flex row-flex  text-center">
            <div class="col-6 ">
                <span class=' text-capitalize '><?=$info_ant['family']?></span>
            </div>
            <div class="col-6">
                <span class=' pl-5 text-capitalize'> <?=$info_ant['subfamily']?></span>
            </div>

        </div>

        <div class=" d-flex row-flex text-center ">
            <div class="col-6">
                <span class=' text-capitalize'><?=$info_ant['alimentation']?></span>
            </div>
            <div class="col-6">
                <span class=' pl-5 text-capitalize'> <?=$info_ant['care']?></span>
            </div>

        </div>

        <div class="d-flex  text-capitalize m-4  ">
            <div class="row p-4 text-left">
                <span><?=$info_ant["features"]?></span>
            </div>
        </div>


    </div>
</div>
<?php
        }
        echo "</div>
        </div>
        ";
    }else{
        echo "
        <div class='p-5' style='margin:0 !important; ' id='container-modals-ants'>
            <div class='d-flex align-content-center flex-wrap p-5' id='container-modals-ants' >


        </div>
        </div>
        ";
    }
    
?>

<div class="row pt-5" id='row-body'>
    <h1>|</h1>
</div>
<div class="row pt-5" id='row-body'>
    <h1>|</h1>
</div>