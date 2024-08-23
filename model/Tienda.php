<?php

/**
 * Created by PhpStorm.
 * Developer: Johen Guevara Santos.
 * Email: mguevara@enfocussoluciones.com
 * Date: 25/09/2019
 * Time: 12:17
 */
require_once "ConexionBD.class.php";
require_once("AccesoBD.class.php");

class Tienda
{
    private $cn;

    //EL CONSTRUCTOR CONSTRUYE LA VARIABLE $cn
    function __construct()
    {
        try {
            $con = ConexionBD::CadenaCN();
            $this->cn = AccesoBD::ConexionBD($con);
            $this->cn->query("SET NAMES 'utf8'");   //ACENTOS UTF8
            $this->cn->set_charset('utf8mb4');   //ACENTOS UTF8
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getStoreStatus()
    {
        try {
            $sql = "SELECT * FROM tienda";
            $lista = AccesoBD::Consultar($this->cn, $sql);
            return $lista[0];
        } catch (Exception $e) {
            $mensaje = "Fecha: " . date("Y-m-d H:i:s") . "\n" .
                "Archivo: " . $e->getFile() . "\n" .
                "Linea: " . $e->getLine() . "\n" .
                "Mensaje: " . $sql . "\n\n";
            error_log($mensaje, 3, "log/proyecto.log");
            throw $e;
        }
    }

    public function updateStoreStatus($value)
    {
        $sql = "UPDATE tienda set  
					estado= '$value' ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function getCostoEnvio()
    {
        try {
            $sql = "SELECT costoDelivery FROM tienda where idTienda = 1";
            $lista = AccesoBD::Consultar($this->cn, $sql);
            return $lista[0];
        } catch (Exception $e) {
            $mensaje = "Fecha: " . date("Y-m-d H:i:s") . "\n" .
                "Archivo: " . $e->getFile() . "\n" .
                "Linea: " . $e->getLine() . "\n" .
                "Mensaje: " . $sql . "\n\n";
            error_log($mensaje, 3, "log/proyecto.log");
            throw $e;
        }
    }

    public function updateCostoEnvio($value)
    {
        $sql = "UPDATE tienda set  
					costoDelivery = '$value'  where idTienda = 1";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function getEstadoTiendas()
    {
        try {
            $sql = "SELECT * FROM tienda ";
            $lista = AccesoBD::Consultar($this->cn, $sql);
            return $lista;
        } catch (Exception $e) {
            $mensaje = "Fecha: " . date("Y-m-d H:i:s") . "\n" .
                "Archivo: " . $e->getFile() . "\n" .
                "Linea: " . $e->getLine() . "\n" .
                "Mensaje: " . $sql . "\n\n";
            error_log($mensaje, 3, "log/proyecto.log");
            throw $e;
        }
    }

    public function updateDisponibilidadTienda($status, $idTienda)
    {
        $sql = "UPDATE tienda set  
					acepta_pedidos = '$status'  where idTienda = '$idTienda'";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateCupon($cupon)
    {

        $sql = "UPDATE tienda set  
        cupon = '$cupon'
        WHERE idTienda = 1
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateDescuento($descuento)
    {

        $sql = "UPDATE tienda set  
        descuento = '$descuento'
        WHERE idTienda = 1
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateCantidadTotal($cantidad_total)
    {

        $sql = "UPDATE tienda set  
        cantidadTotal = '$cantidad_total'
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateFechaLince($fecha)
    {

        $sql = "UPDATE tienda set  
        fecha_cupon = '$fecha'
        WHERE idTienda = 1
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateCupon2($cupon)
    {

        $sql = "UPDATE tienda set  
        cupon_dos = '$cupon'
        WHERE idTienda = 1
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateCuponSurco($cupon)
    {

        $sql = "UPDATE tienda set  
        cupon = '$cupon' WHERE idTienda = 2
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateDescuentoSurco($descuento)
    {

        $sql = "UPDATE tienda set  
        descuento = '$descuento'
        WHERE idTienda = 2
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateFechaSurco($fecha)
    {

        $sql = "UPDATE tienda set  
        fecha_cupon = '$fecha'
        WHERE idTienda = 2
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateCuponJesusMaria($cupon)
    {

        $sql = "UPDATE tienda set  
        cupon = '$cupon' WHERE idTienda = 3
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateDescuentoJesusMaria($descuento)
    {

        $sql = "UPDATE tienda set  
        descuento = '$descuento'
        WHERE idTienda = 3
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    public function updateCantidadTotalJesusMaria($cantidad_total)
    {

        $sql = "UPDATE tienda set  
        cantidadTotal = '$cantidad_total'
        WHERE idTienda = 3
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }

    /*  public function updateDescuento2($descuento)
    {

        $sql = "UPDATE tienda set  
        descuento_dos = '$descuento'
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    } */

    /*  public function updateCantidadTotal2($cantidad_total)
    {

        $sql = "UPDATE tienda set  
        cantidadTotal_dos = '$cantidad_total'
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    } */

    public function getTiendaById()
    {
        try {
            $sql = "SELECT * FROM tienda";
            $lista = AccesoBD::Consultar($this->cn, $sql);
            return $lista[0];
        } catch (Exception $e) {
            $mensaje = "Fecha: " . date("Y-m-d H:i:s") . "\n" .
                "Archivo: " . $e->getFile() . "\n" .
                "Linea: " . $e->getLine() . "\n" .
                "Mensaje: " . $sql . "\n\n";
            error_log($mensaje, 3, "log/proyecto.log");
            throw $e;
        }
    }

    public function getTiendaByIdSurco($store_id)
    {
        try {
            $sql = "SELECT * FROM tienda WHERE idTienda = $store_id";
            $lista = AccesoBD::Consultar($this->cn, $sql);
            return $lista[0];
        } catch (Exception $e) {
            $mensaje = "Fecha: " . date("Y-m-d H:i:s") . "\n" .
                "Archivo: " . $e->getFile() . "\n" .
                "Linea: " . $e->getLine() . "\n" .
                "Mensaje: " . $sql . "\n\n";
            error_log($mensaje, 3, "log/proyecto.log");
            throw $e;
        }
    }

    public function getTiendaByIdJesusMaria()
    {
        try {
            $sql = "SELECT * FROM tienda WHERE idTienda = 3";
            $lista = AccesoBD::Consultar($this->cn, $sql);
            return $lista[0];
        } catch (Exception $e) {
            $mensaje = "Fecha: " . date("Y-m-d H:i:s") . "\n" .
                "Archivo: " . $e->getFile() . "\n" .
                "Linea: " . $e->getLine() . "\n" .
                "Mensaje: " . $sql . "\n\n";
            error_log($mensaje, 3, "log/proyecto.log");
            throw $e;
        }
    }

    public function updateFechaJesusMaria($fecha)
    {

        $sql = "UPDATE tienda set  
        fecha_cupon = '$fecha'
        WHERE idTienda = 3
        ";
        $id = AccesoBD::Insertar($this->cn, $sql);
        return $id;
    }
}
