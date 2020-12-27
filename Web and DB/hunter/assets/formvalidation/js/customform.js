 $(document).ready(function() {
    $("#pdetailform").formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            color: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Color'
                    }
                }
            },
            size: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Size'
                    }
                }
            },
        }
    }).on('success.form.fv', function(e) {
            var $form        = $(e.target),
            $button      = $form.data('formValidation').getSubmitButton();
            var site_url = "<?php echo base_url(); ?>";
            e.preventDefault();
            var productid = $(this).attr("data-id");
            var qty = $(".product_"+productid+" #qty").val();
            // var size = $(".product_"+productid+" #size label.active :input[name=size]").val();
            // var color = $(".product_"+productid+" #color label.active :input[name=color]").val();
            var size = $('#SizeSelector').val();
            var color = $('#colorSelect').val();
            // alert("qty : "+qty+" | size : "+size+" | color : "+color);
            if($button.attr('id') == "ATC") {
                $.ajax({
                    url: site_url+"cart/addProductInCart",
                    type: 'POST',
                    data: 'productid='+productid+'&qty='+qty+'&size='+size+'&color='+color,
                    success: function(data){
                        if(data.found==0)
                        {
                            var cartDropdown = data.cartDropdown;
                            var count = data.count;
                            $("#cart_product_list").html(cartDropdown);
                            $("#cart_product_list1").html(cartDropdown);
                            $("#cart-total").html(count);
                            $("#cart-total1").html(count);
                            
                            $(".product_"+productid+" #product_added_success").fadeIn();
                            setTimeout(function() {
                                $(".product_"+productid+" #product_added_success").hide().fadeOut();
                            }, 10000);
                        }else{
                            alert(data.msg);
                        }
                    }
                });
            }else{
                $.ajax({
                    url: site_url+"cart/buyNow",
                    type: 'POST',
                    data: 'productid='+productid+'&qty=1&size='+size+'&color='+color+'&phonebrand='+phoneBrand+'&phone='+phone,
                    success: function(result){
                        location.href=site_url+'shopping-cart';
                    }
                });
            }
        });
    });

            $('.colorImage').on('click',function(){
                var image = $(this).attr('data-image');
                if(image!=''){
                    $('.slider-for').find('.slick-active').find('img').attr('src',image);
                }
            });

            if(!!window.performance && window.performance.navigation.type === 2)
            {
                window.location.reload();
            }