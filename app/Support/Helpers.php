<?php


if( !function_exists( 'getData' ) ) {
    
    function getData( $data ){
        return date('d/m/Y', strtotime($data));
    }
}

if( !function_exists( 'getStatusChamada' ) ) {
    
    function getStatusChamada( $id ){
        switch($id){
            case 0: return "<span class='label label-danger'>Não finalizada</span>"; break;
            case 1: return "<span class='label label-success'>Concluida</span>"; break;
            default: return "<span class='label label-danger'>Não finalizada</span>"; break;
        }
    }
}


if( !function_exists( 'getStudant' ) ) {
    
    function studantIsChecked( $presencas, $aluno_id ){
        if(isset($presencas) && count($presencas) > 0 ){
            foreach($presencas as $presenca){
                if( $aluno_id == $presenca->aluno_id && $presenca->presenca == 1 )
                    return "checked";
            }
        }
    }
}

if( !function_exists( 'getTotalFrequencia' ) ) {

    function getTotalFrequencia( $aluno_id, $chamada_id ){
        $resultado = \DB::table('chamada_alunos')
            ->select('presenca')
            ->where('aluno_id', '=', $aluno_id)
            ->where('chamada_id', '=', $chamada_id)
            ->distinct()
            ->first();

        if(isset($resultado->presenca))
            if($resultado->presenca == 1)
                return "<span class='label label-success'>Presente</span>";
            if($resultado->presenca == 0)
                return "<span class='label label-danger'>Ausente</span>";

        return "<span class='label label-warning'>none</span>";
    }
}

if( !function_exists( 'getTotalFaltas' ) ) {
    
    function getTotalFaltas( $aluno_id ){
        $resultado = \DB::table('lista_faltas')
                     ->select('total_faltas')
                     ->where('aluno_id', '=', $aluno_id)
                     ->distinct()
                     ->first();
        if(isset($resultado->total_faltas))
            return $resultado->total_faltas;
        
        return 0;
    }
}




