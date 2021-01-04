<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>

<script src="{{ url('js/index.js') }}"></script>
<script src="{{ url('js/translate.js') }}"></script>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $("#myCarousel-multi").on("slide.bs.carousel", function(e) {
                var $e = $(e.relatedTarget);
                var idx = $e.index();
                var itemsPerSlide = 4;
                var totalItems = $(".carousel-item").length;

                if (idx >= totalItems - (itemsPerSlide - 1)) {
                    var it = itemsPerSlide - (totalItems - idx);
                    for (var i = 0; i < it; i++) {
                        // append slides to end
                        if (e.direction == "left") {
                            $(".carousel-item")
                                .eq(i)
                                .appendTo(".carousel-inner");
                        } else {
                            $(".carousel-item")
                                .eq(0)
                                .appendTo($(this).find(".carousel-inner"));
                        }
                    }
                }
            });


            $('#subscriptionForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "/subscribe",
                    type: "post",
                    dataType: "json",
                    data: $("#subscriptionForm").serialize(),
                    success: function(response) {
                        console.log(response);
                        if (response) {
                            $('#success-message').text(response.success);
                            $("#subscriptionForm")[0].reset();
                        }
                    },
                });
            });


        });
    });


    function checkCode() {

        var code = document.getElementById("code").value;
        var total = document.getElementById("total-price");
        var totalCode = document.getElementById("total-price-code");
        var codeValue = document.getElementById("code-value").value;
        var codeDiscount = document.getElementById("code-discount").value;

        $.ajax({
            type: 'GET',
            url: '/code/' + code,
            success: function(data) {

                totalCode.innerHTML = parseInt(total.innerHTML - (total.innerHTML * (data.Discount.value /
                    100))) + ' &#8362;';
                codeValue = parseInt(total.innerHTML - (total.innerHTML * (data.Discount.value / 100)));
                codeDiscount = data.Discount.value;
                console.log(codeDiscount);
            }
        });
    }

</script>
@if(Session::has('message'))
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>
@endif
