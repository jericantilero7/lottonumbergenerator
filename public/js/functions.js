function get_unique_numbers(){
    var first = 1;
    var last = 58;
    var combinations = [];

    while(combinations.length < 3){
        var number = Math.floor(Math.random() * (last - first + 1)) + first;
        if(combinations.indexOf(number) > -1) continue;
        
        combinations[combinations.length] = number;
    }

    return combinations;
}

function check_duplicates(){
    var elements = $('input[name="combi[]"]');

    for(var x = 0; x < elements.length; x++){
        for(var y = 0; y < elements.length; y++){
            if(x !== y && $(elements[x]).val() == $(elements[y]).val())
                return true;
        }
    }

    return false;
}

function check_all_value(){
    var elements = $('input[name="combi[]"]');
    var ctr = 0;
    for(var i = 0; i < elements.length; i++){
        if($(elements[i]).val())
            ctr++;
    }

    return ctr == 3 ? true : false;
}

function check_if_in_range(number){
    var elements = $('input[name="combi[]"]');
    var first = 1;
    var last = 58;
    var ctr = 0;

    for(var i = 0; i < elements.length; i++){
        ctr = $(elements[i]).val() >= first && $(elements[i]).val() <= last ? ctr + 1 : ctr;
    }

    return ctr == 3 ? true : false;
}


function no_duplicate_number(){
    if(check_all_value()){
        if(check_if_in_range()){
            if(check_duplicates()){
                alert_msg('Invalid Combination! Each numbers must be unique.')
                $('.btn-add').attr('disabled', 'disabled');
            }else{
                $('.alerts').hide();
                $('.btn-add').removeAttr('disabled');
            }
        }else{
            alert_msg('Invalid number! Number must be between 1 - 58 only.')
            $('.btn-add').attr('disabled', 'disabled');
        }
    }else{
        alert_msg('Please enter a number! To complete combination.')
        $('.btn-add').attr('disabled', 'disabled');    
    }
}

function alert_msg(msg){
    $('.alerts').show();
    $('.error').text(msg);
}