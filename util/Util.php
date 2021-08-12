<?php
class Util{
    
    static public function session_existe() {
        session_start();
        // pegando a hora do ultimo acesso do usuario na sessao.
        $ultimo_acesso = $_SESSION['hora_ultimo_acesso']; //14:10:40
        date_default_timezone_set('America/Sao_Paulo');
        $agora = date("Y-n-j H:i:s");

        $TEMPO_TRANSCORRIDO = (strtotime($agora)) - (strtotime($ultimo_acesso));
        if ($TEMPO_TRANSCORRIDO >= $_SESSION['TEMPO_DA_SESSAO']) {
            session_destroy();
            return FALSE;
        } else {
            return TRUE;
            $_SESSION['hora_ultimo_acesso'] = $agora;
        }
    }
    
    static public function format_data_AAAA_MM_DD($data_brasil) {
        list($dia, $mes, $ano) = explode('/', $data_brasil);
        $data_americana = $ano . '-' . $mes . '-' . $dia;
        return $data_americana;
    }

    static public function format_data_DD_MM_AAAA($data_americana) {
        list($ano, $mes, $dia) = explode('-', $data_americana);
        $data_brasileira = $dia . '/' . $mes . '/' . $ano;
        return $data_brasileira;
    }

    static public function format($data_str) {
        $data_real = explode(" ", $data_str);
        $data_formatada = $data_real[0];
        $hora_formatada = $data_real[1];
        $data = explode("-", $data_formatada);
        $d = $data[2] . "/" . $data[1] . "/" . $data[0];
        $sdata = $d . " " . $hora_formatada;
        return $sdata;
    }
    
}
?>
