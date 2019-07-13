<script type="text/javascript">
function valregister(){
            var x=register.username.value;
            var x1=parseInt(x);
            if(register.username.value==""){
                        alert("Username masih kosong");
                        register.username.focus();
                        return false;      
            }if(isNaN(x1)==false){
                        alert("Username harus huruf");
                        register.username.focus();
                        return false;    
            }
            var z=register.password.value;
            var panjang=z.length;
            if(register.password.value==""){
                        alert("Password masih kosong");
                        register.password.focus();
                        return false;
            } if(panjang<6 || panjang>8){
                        alert("Password minimum 6 karakter dan maksimum 8 karakter");
                        register.password.focus();
                        return false;
            }
             return true; 
}
</script>

<body>

    <div class="col s7">
            <h3 align="center">Masukan Data Admin</h3>
            <form  role="form" name="register" method="post" onSubmit="return valregister()" action="terimaadmin.php">
            <table align="center">
            <tr>
            <td>Masukan username </td>
            <td><input type="text" id="username" name="username"/></td>
            </tr>
            <tr>
            <td>Masukan password</td>
            <td><input type="text" id="password" name="password"/></td>
            </tr>
            <tr>
            <td></td>
            <td><input class="btn waves-effect waves- blue darken-1" type ="submit" value="submit"/></td>
            </tr></table>
            </form>
      </div>
</body>
</html>