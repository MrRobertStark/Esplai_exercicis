<?php
    $sql = "SELECT CustomerID FROM customers WHERE CustomerID = '".$_GET['erase']."'";//Comanda sql
    $customers = $conn->query($sql);//execució de la comanda
    if($customers->num_rows>0){//Si existeix el customer a esborrar...
        $sql = "DELETE FROM customers WHERE CustomerID = '".$_GET['erase']."'";//comanda sql per esborrar customer
        if($conn->query($sql)){//Execució correcte la query
        ?>
            <!-- Modal el·liminar client executat correctament-->
            <div class="modal fade modal_erase" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center"><i class = "fa fa-check text-success"></i> Client el·liminat correctament</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>El client "<?php echo $_GET["erase"]?>" s'ha el·liminat correctament de la llista dels customers.</p>
                        </div>
                        <div class="modal-footer w-100">
                            <a href="#!" class = "btn btn-primary mx-auto w-50" data-dismiss="modal">D'acord</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        else{ // Execució incorrecte de la comanda query
        ?>
            <!-- Modal el·liminar client executat correctament-->
            <div class="modal fade modal_erase" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center"><i class = "fa fa-times text-danger"></i> Error el·liminant client</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>El client "<?php echo $_GET["erase"]?>" no s'ha pogut treure del llistat de customers a causa d'un error. Torna-ho a intentar</p>
                        </div>
                        <div class="modal-footer w-100">
                            <a href="#!" class = "btn btn-primary mx-auto w-50" data-dismiss="modal">D'acord</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }