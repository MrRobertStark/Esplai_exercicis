


function calculate_fibonnaci(parameter){
    var c = parameter;
    var one = 0; //prev
    var two = 1; //current
    var three = 0; //aux

    for(var i = 1; i < parameter; i++){
        three = one + two;
        one = two;
        two = three;
    }
    return three;
}