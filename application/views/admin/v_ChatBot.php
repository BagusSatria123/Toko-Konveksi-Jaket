<!-- Navigation -->
<?php
$this->load->view('admin/templates/v_header');
$this->load->view('admin/templates/v_sidebar');
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="https://localhost/konveksi/welcome\">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Chat Bot</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chat Bot</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <div class="panel-heading">

                    Chat ini

                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <form action='' method='POST'>
                            Pesan : <textarea class="form-control" id="exampleFormControlTextarea1" rows="20" name='pesan'></textarea><br>
                            <input type='submit' value='Kirim Pesan'>
                        </form>
                        <?php
                        if (isset($_POST['pesan'])) {
                            $url = "https://api.telegram.org/bot1298673990:AAEKQLfaZk2LZZXXXEVQfZWVCjMOE5MM-xo/sendMessage?chat_id=-476726087&parse_mode=HTML&text=" . $_POST['pesan'];
                            $curlHandle = curl_init();
                            curl_setopt($curlHandle, CURLOPT_URL, $url);
                            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
                            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                            curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
                            curl_setopt($curlHandle, CURLOPT_POST, 1);
                            $result = curl_exec($curlHandle);
                            curl_close($curlHandle);

                            echo "terkirim";
                        }
                        ?>