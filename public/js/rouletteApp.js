jQuery.noConflict();
jQuery(function($){
    let participants = '';
    let winner='';
    let index = '';
    let memberId = '';
    let winnerId = '';
    let output = '';
    let rouletter = '';
    let rouletter2 = '';
    let rouletter3 = '';
    let rouletter4 = '';
    let s1,s2,s3,s4;
    let r1,r2,r3,r4;

    $('.start').attr('disabled', 'true');

    $('body').keydown(function(e) {
        if (e.keyCode === 32) {
            $("p").addClass("winner-name-hide");
            confetti.maxCount = 0;
            confetti.stop();
            startRoulette();
        }
    })

    init = function() {

    }
    r1 = {
        speed: 50,
        duration: 40,
        startCallback : function() {
            $('.start').attr('disabled', 'true');
            $('#claim-prize').attr('disabled', 'true');
            $('winner-name').css('display','none');

        },
        slowDownCallback : function() {

        },
        stopCallback : function() {

        }

    }

    r2 = {
        speed: 60,
        duration: 50,

        startCallback : function() {

        },
        slowDownCallback : function() {

        },
        stopCallback : function() {

        }

    }

    r3 = {
        speed: 75,
    duration: 7,
        startCallback : function() {
        },
        slowDownCallback : function() {

        },
        stopCallback : function() {

        }

    }

    r4 = {
        speed: 85,
        duration: 10,
        startCallback : function() {

        },
        slowDownCallback : function() {

        },
        stopCallback : function() {
            confetti.maxCount = 500;

            setTimeout(() => {
                $(".winner-name").text(winner.client_name);
                confetti.start();
                $("p").removeClass("winner-name-hide");
                $('.start').removeAttr('disabled');
               $('#claim-prize').removeAttr('disabled');
            }, 1000);

            setTimeout(() => {
                confetti.stop();
            }, 4000);

        }

    }
    function startRoulette() {

        let n1,n2,n3,n4;

        n1 = Math.floor(Math.random() * 5);
        n2 = Math.floor(Math.random() * 10);
        n3 = Math.floor(Math.random() * 10);
        n4 = Math.floor(Math.random() * 10);

        // alert(`${n1} ${n2} ${n3} ${n4}`);

        index = Math.floor((Math.random() * participants.length - 1) + 1);
        winner = participants[index];
        winnerId = Array.from(String(winner.memberId), Number);

        if (winnerId.length == 1) {
            winnerId.unshift(0)
            winnerId.unshift(0)
            winnerId.unshift(0)
        }

        if (winnerId.length == 2) {
            winnerId.unshift(0)
            winnerId.unshift(0)
        }

        if (winnerId.length == 3) {
            winnerId.unshift(0)
        }

        updateParamater(winnerId);
        rouletter.roulette('start');
        rouletter2.roulette('start');
        // setTimeout(() => {
        //     rouletter2.roulette('start');
        // }, 100);
        // setTimeout(() => {
        //     rouletter3.roulette('start');
        // }, 150);
        // setTimeout(() => {
        //     rouletter4.roulette('start');
        // }, 200);
        rouletter3.roulette('start');
        rouletter4.roulette('start');

    }

    var getNotWinners = function() {
        jQuery.get("/notWinners", function(data) {
            participants = data;
            $('.start').removeAttr('disabled');
            //console.table(participants);
        });
    }



    var url = window.location.pathname;
    var raffleId = url.substring(url.lastIndexOf('/') + 1);

    var getRaffleSettings = function() {
        jQuery.ajax({
            type: "GET",
            url: "/raffle-setting/" + raffleId,
            dataType: 'json',
            success: function(data) {
                s1 = data.roulette_one;
                s2 = data.roulette_two;
                s3 = data.roulette_three;
                s4 = data.roulette_four;

            },
            error: function(error) {
                console.log(error)
            }
        })

    }



    var getRafflePrize = function() {
        jQuery.get("/currentPrize",function(data) {
            // console.log(data);
            $("#raffle-prize-label").html(`${data.prize} - ${data.description}`);
        })
    }

    getNotWinners();
    getRaffleSettings();
    getRafflePrize();

    function submitWinner() {
        swal({
            title: "Are you sure?",
            text: `${winner.client_name} will be tagged as winner. Do you want to continue?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                participants.splice(index, 1);
                tagAsWinner();
                $(".winner-name").text("");
                $("p").addClass("winner-name-hide");
                $('.start').removeAttr('disabled');
               $('#claim-prize').attr('disabled','true');

            } else {

            }
          });
    }

    var tagAsWinner = function() {
        $.ajax({
            type: "get",
            url: "/tagAsWinner/" + winner.memberId,
            success: function(data) {
                toastr.success(`${data.client_name} successfully added to winners`,"Success");
            }
        })
    }


    $("#claim-prize").click(function(e){
        submitWinner();
    })

    var updateParamater = function(arrayNumber) {
		r1['stopImageNumber'] = Number(arrayNumber[0]);
		r2['stopImageNumber'] = Number(arrayNumber[1]);
		r3['stopImageNumber'] = Number(arrayNumber[2]);
        r4['stopImageNumber'] = Number(arrayNumber[3]);

        r1['duration'] = parseInt(s1);
		r2['duration'] = parseInt(s2);
		r3['duration'] = parseInt(s3);
		r4['duration'] = parseInt(s4);

		rouletter.roulette('option', r1);
        rouletter2.roulette('option', r2);
        rouletter3.roulette('option', r3);
        rouletter4.roulette('option', r4);
	}


    $('.start').click(function() {
        confetti.stop()
        startRoulette();
        $("p").addClass("winner-name-hide");
        // let n1,n2,n3,n4;
        // n1 = Math.floor(Math.random() * 5);//0-5
        // n2 = Math.floor(Math.random() * 10); //0-9
        // n3 = Math.floor(Math.random() * 10);
        // n4 = Math.floor(Math.random() * 10);
        // alert(`${n1} ${n2} ${n3} ${n4}`);

    });

    rouletter = $('div#roulette1');
	rouletter2 = $('div#roulette2');
	rouletter3 = $('div#roulette3');
    rouletter4 = $('div#roulette4');


    rouletter.roulette(r1);
    rouletter2.roulette(r2);
    rouletter3.roulette(r3);
    rouletter4.roulette(r4);

});

