<?php
    //Recepció de les dades
    $id = $_POST["customerId"];
    $nom = $_POST["nomClient"];
    $company = $_POST["companyClient"];
    $titol = $_POST["titolClient"];
    $pais = $_POST["paisClient"];
    $regio = $_POST["regioClient"];
    $ciutat = $_POST["ciutatClient"];
    $tel = $_POST["telClient"];
    $fax = $_POST["faxClient"];
    $address = $_POST["addressClient"];
    $postal = $_POST["postalClient"];

    //Execució de la query
    $sql = "UPDATE customers SET CompanyName = '".$company."', ContactName = '".$nom."', ContactTitle = '".$titol."', customers.Address = '".$address."', PostalCode = '".$postal."' , City = '".$pais."', Region = '".$regio."', Country = '".$pais."', Phone = '".$tel."', Fax = '".$fax."' WHERE CustomerID = '".$id."'";
    if($conn->query($sql)){
    ?>
        <!-- Modal el·liminar client executat correctament-->
        <div class="modal fade modal_update" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center"><i class = "fa fa-check text-success"></i> Client actualitzat correctament</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>El client "<?php echo $_POST["nomClient"]?>" s'ha actualitzat correctament de la llista dels customers.</p>
                    </div>
                    <div class="modal-footer w-100">
                        <a href="#!" class = "btn btn-primary mx-auto w-50" data-dismiss="modal">D'acord</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    else{
    ?>
        <!-- Modal el·liminar client executat correctament-->
        <div class="modal fade model_update" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center"><i class = "fa fa-times text-danger"></i> El client no s'ha actualitzat</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>El client "<?php echo $_POST["nomClient"]?>" no s'ha el·liminat correctament de la llista dels customers. Torna-ho a intentar.</p>
                    </div>
                    <div class="modal-footer w-100">
                        <a href="#!" class = "btn btn-primary mx-auto w-50" data-dismiss="modal">D'acord</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
}