function new_note() {
    $('.add_note').css({
        'opacity' : '1', 'visibility' : 'visible', 'transition' : 'all 1s'
    });
    $('.show_note').css({
        'opacity' : '0', 'visibility' : 'hidden', 'transition' : 'all 0.5s'
    });
}
function cancel() {
    $('.add_note').css({
        "opacity" : "0", "visibility" : "hidden", "transition" : "all 1.5s"
    });
    setTimeout(function () {
        var t = document.getElementById('note_text');
        var tv = t.value;
        if (tv != ''){
            t.value = '';
        }
    }, 1300);
}

function delete_note() {
    $.get("delete_note.php");
    document.location.href = 'notes.php';
}

$(document).ready(function () {
    $('#p_prldr').css({
        'opacity' : '0', 'visibility' : 'hidden', 'transition' : 'all 1s'
    });

    $.get("show_notes_name.php", function (data) {
        var q = JSON.parse(data);
        var j = q[q.length-2];
        var count = q[q.length-1];
        var i = 1;
        for(var v in j){
            if (i <= count){
                var element = document.getElementById('notes_name');
                var sp = document.createElement('span');
                var br = document.createElement('br');
                var im = document.createElement('img');
                var dv = document.createElement('div');

                dv.appendChild(sp);
                dv.appendChild(im);
                dv.style.height = '15%';
                dv.className = 'note_name_area';

                im.src = 'images/поле.png';
                im.style.height = '100%';
                im.className = 'area';


                sp.innerHTML = j[v];
                sp.id = 'name' + i;
                sp.className = 'note_name_button';
                sp.style.height = '15%';
                sp.style.width = '47%';

                sp.onclick = function () {
                    $('.add_note').css({
                        'opacity' : '0', 'visibility' : 'hidden', 'transition' : 'all 1s'
                    });
                    $('.show_note').css({
                        'opacity' : '1', 'visibility' : 'visible', 'transition' : 'all 1s'
                    });

                    var el = (document.getElementById(this.id).innerHTML);
                    var ts = document.getElementById('note_name_show');
                    var tsv = ts.value;
                    if (tsv != el){
                        ts.value = el;
                    }

                    $.ajax({
                        url: 'show_notes_text.php',
                        data: 'postVar=' + el,
                        type: "POST",
                        success: function (data) {
                            var t = document.getElementById('note_text_show');
                            t.innerHTML = data;

                        }
                    });
                    var n = document.getElementById('note_name_show');
                    n.innerHTML = el;

                };


                element.appendChild(dv);

            }
            i++;
        }
    });

});