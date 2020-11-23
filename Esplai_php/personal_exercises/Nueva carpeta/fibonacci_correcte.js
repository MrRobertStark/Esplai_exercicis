


function calculate_fibonnaci(position_series){
//It returns the number of the series located at "position_series"
//or -1 is returned if "position_series" is not-valid
    
    var result = -1; 
    //Comprovation that the parameter is valid
    if(position_series < 2){
        warn_user();
    }
    else {
        //We declare the necessary variables
        var prev = 0;
        var current = 1;
        var index = 0;

        //Loop to calculate the result
        for(index = 1; index < position_series; index++){
            var aux = prev + current;
            prev = current;
            current = aux;
        }
        result = current;
    }
    //We return the result of the operation
    return result;
}

function warn_user(){
    console.log("Introdueix un número superior a 1!");
}