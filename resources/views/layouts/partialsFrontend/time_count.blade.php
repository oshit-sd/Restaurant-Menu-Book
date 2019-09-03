<script>
    $(document).ready(function() {
        // Set the date we're counting down to
        var countDownDate = new Date("{{$endTime}}").getTime();
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minute = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var second = Math.floor((distance % (1000 * 60)) / 1000);

        // Run the countdown
        $(".sandClock_{{$i}}").circularCountDown({
            delayToFadeIn: 500,
            size: 55,
            fontColor: '#fff',
            colorCircle: 'white',
            background: '#2ECC71',
            reverseLoading: false,
            duration: {
                // seconds: parseInt($('.delay').val())
                hours: hour,
                minutes: minute,
                seconds: second
            },
            beforeStart: function() {
                $('.launcher').hide();
            },
            end: function(countdown) {
                countdown.destroy();
                $('.launcher').show();
                $(".tableDiv_{{$i}}").css("background", "red");
                $(".sandClock_{{$i}}").html("EXPIRED TIME");
            }
        });

        if (distance < 0) {
            $(".sandClock_{{$i}}").html("EXPIRED TIME");
            $(".tableDiv_{{$i}}").css("background", "red");
        }
    });

</script>