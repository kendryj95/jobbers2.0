<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use View;

class con_index extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vista               = View::make("index");
        $sql_ultimas_ofertas = 'SELECT t1.id,t2.nombre_aleatorio, t1.titulo,CONCAT(t3.provincia," / ",t4.localidad) as direccion,UPPER(t5.nombre) as empresa,t6.nombre, t1.tmp, t1.id_empresa FROM tbl_publicacion t1
            LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_imagen
            LEFT JOIN tbl_provincias t3 ON t3.id = t1.id_provincia
            LEFT JOIN tbl_localidades t4 ON t4.id = t1.id_localidad
            LEFT JOIN tbl_empresa t5 ON t5.id = t1.id_empresa
            LEFT JOIN tbl_disponibilidad t6 ON t6.id = t1.id_disponibilidad
            ORDER BY t1.id ASC LIMIT 0,5';
        $sql_logos_empresas = "SELECT t1.id,t2.nombre_aleatorio FROM tbl_empresa t1
        LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_imagen
        LIMIT 0,5";

        $sql_tips = "SELECT t1.*,t2.nombre_aleatorio FROM `tbl_tips` t1
        LEFT JOIN tbl_archivos t2 ON t1.id_archivo = t2.id LIMIT 0,3";

        $sql_provincias = "SELECT * FROM tbl_provincias ORDER BY provincia";

        $sql_count_jobbers = "SELECT COUNT(*) AS count FROM tbl_usuarios WHERE tipo_usuario=2";

        try {
            $ultimas_publicaciones        = DB::select($sql_ultimas_ofertas);
            $logos_empresas               = DB::select($sql_logos_empresas);
            $tips                         = DB::select($sql_tips);
            $count_jobbers                = DB::select($sql_count_jobbers);
            $provincias                   = DB::select($sql_provincias);
            $vista->tips                  = $tips;
            $vista->count_jobbers         = number_format($count_jobbers[0]->count, 0, '', '.');
            $vista->logos_empresas        = $logos_empresas;
            $vista->ultimas_publicaciones = $ultimas_publicaciones;
            $vista->provincias = $provincias;
            return $vista;
        } catch (Exception $e) {

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
