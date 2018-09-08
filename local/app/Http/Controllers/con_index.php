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
        $sql_ultimas_ofertas = "SELECT t1.direccion, t1.id, t1.id_empresa, t1.confidencial, t1.id_modalidad_publicacion AS modalidad, t2.nombre_aleatorio as imagen,t3.nombre, t3.web, t3.facebook, t3.twitter, t3.instagram, t3.linkedin, (SELECT COUNT(*) FROM tbl_publicacion WHERE id_empresa=t1.id_empresa) AS q_ofertas,t4.nombre as sectores,t1.titulo,t5.nombre as areas,t6.nombre as disponibilidad,t7.provincia,t8.localidad,t1.discapacidad,t1.descripcion,t1.estatus,DATE_FORMAT(t1.fecha_venc, '%d/%m/%Y') AS fecha_venc,t1.vistos,IF(DATE_FORMAT(t1.tmp, '%Y-%m-%d')=CURDATE(),'Hoy',DATE_FORMAT(t1.tmp, '%d/%m')) AS fecha_pub, DATE_FORMAT(t1.tmp, '%h:%i %p') AS hora_pub,t9.id_plan FROM tbl_publicacion t1
            LEFT JOIN tbl_empresa t3 ON t1.id_empresa = t3.id
            LEFT JOIN tbl_usuarios_foto_perfil t10 ON t3.id_usuario = t10.id_usuario
            LEFT JOIN tbl_archivos t2 ON t10.id_foto = t2.id
            LEFT JOIN tbl_empresas_planes t9 ON t1.id_empresa = t9.id_empresa
            LEFT JOIN tbl_areas_sectores t4 ON t1.id_sector = t4.id
            LEFT JOIN tbl_areas t5 ON t1.id_area = t5.id
            LEFT JOIN tbl_disponibilidad t6 ON t1.id_disponibilidad = t6.id
            LEFT JOIN tbl_provincias t7 ON t1.id_provincia = t7.id
            LEFT JOIN tbl_localidades t8 ON t1.id_localidad = t8.id
            WHERE t1.estatus = 1 
            GROUP BY t1.id ORDER BY t1.tmp DESC LIMIT 0,5";
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
