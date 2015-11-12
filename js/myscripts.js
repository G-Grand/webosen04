$(document).ready(function(){

    $("#addorder").validate({
        
       rules:{ 
        
            city:{
                required: true,
                
            },
            
            district:{
                required: true,
                
            },
            street:{
                required: true,
                
            },
            order_view:{
                required: true,
                
            },
            rooms:{
                required: true,
                number: true,
            },
            floor:{
                required: true,
                number: true,
            },
            all_floor:{
                required: true,
                number: true,
            },
            general:{
                required: true,
                number: true,
            },
            price:{
                required: true,
                number: true,
            },
       },
       
       messages:{
        
            city:{
                required: " поле обязательно для заполнения",
                
            },
            
            district:{
                required: " поле обязательно для заполнения",
            },
            street:{
                required: " поле обязательно для заполнения",
           
                
            },
            order_view:{
                required: " поле обязательно для заполнения",
            },
                
           
            rooms:{
                required: " поле обязательно для заполнения",
                number: "Введите число",
            },
            floor:{
                required: " поле обязательно для заполнения",
                number: "Введите число",
            },
            all_floor:{
                required: " поле обязательно для заполнения",
                number: "Введите число",
            },
            general:{
                required: " поле обязательно для заполнения",
                number: "Введите число",
            },
            price:{
                required: " поле обязательно для заполнения",
                number: "Введите число",
            },
        }
    });

$("#phone").inputmask("+3(999)999-99-99");
}); //end of ready

