<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="form-group">
        <br>
        <label>
            <h5 style="color: tomato;"><b>Status Verifikasi : </b></h5>
        </label><br>
        <p>( Status Saat Ini</b> )<p>
        <input type="radio" name="status" id="diproses"
            value=" Diproses" class="status">
        <label for="status2">Diproses</label><br>
        <input type="text" class="form-control mt-3" id="tgl_proses" name="tgl_proses" value=""><br>
        
        <input type="radio" name="status" id="selesai"
            value=" Selesai" class="status">
        <label for="status2">Selesai</label><br>
        <input type="text" class="form-control mt-3" id="tgl_selesai" name="tgl_selesai" value="">
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".status").click(function() {
                    if ($("input[name='status']:checked").val() == "Diproses") {
                        // var date = new Date();
                        // var y = date.getFullYear();
                        // var m = date.getMonth() + 1;
                        // var d = date.getDate();
                        // $("#tgl_proses").val(y + "-" + m + "-" + d);
                        // $("#tgl_selesai").val("");
                        console.log("Yuhuu");
                    } else if ($("input[name='status']:checked").val() == "Selesai") {
                        // var date = new Date();
                        // var y = date.getFullYear();
                        // var m = date.getMonth() + 1;
                        // var d = date.getDate();
                        // $("#tgl_proses").val(y + "-" + m + "-" + d);
                        // $("#tgl_selesai").val("");
                        console.log("slebew");
                    }
                });
            });
        </script>
</body>
</html>