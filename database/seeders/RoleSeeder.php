<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creacion de roles
        $role1 = Role::create(['name' => 'ADMINISTRADOR']);    
        $role2 = Role::create(['name' => 'EMPLEADO']);

        //Lllamando al modelo Permission para la creacion de permisos

        Permission::create(['name' => 'admin.home',
        'description' => 'VER DASHBOARD'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index',
        'description' => 'VER USUARIOS'])->syncRoles([$role1]);          //Permiso para autorizar si el usuario administrador podra ver el modulo usuarios

        Permission::create(['name' => 'admin.users.edit',
        'description' => 'ASIGNAR ROLES'])->syncRoles([$role1]);           //Permiso para autorizar si el usuario administrador podra editar el modulo usuarios
       

        Permission::create(['name' => '/admin/almacen/veralmacen',
        'description' => 'VER ALMACÉN'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo 
        Permission::create(['name' => '/admin/almacen/insertaralmacen',
        'description' => 'AGREGAR ALMACÉN'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo 


        Permission::create(['name' => 'admin/catalogo/insertarcgasto',
        'description' => 'AGREGAR A LISTA DE GASTOS'])->syncRoles([$role1, $role2]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo
        Permission::create(['name' => '/admin/catalogo/actualizarcgasto/',
        'description' => 'EDITAR LISTA DE GASTOS'])->syncRoles([$role1, $role2]);               //Permiso para autorizar si el usuario podra editar o no el modulo 
        Permission::create(['name' => '/admin/catalogo/eliminarcgasto/',
        'description' => 'ELIMINAR LISTA DE GASTOS'])->syncRoles([$role1, $role2]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo 


        Permission::create(['name' => '/admin/cliente/vercliente',
        'description' => 'VER CLIENTES'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo
        Permission::create(['name' => '/admin/cliente/insertarcliente',
        'description' => 'AGREGAR CLIENTES'])->syncRoles([$role1, $role2]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo 
        Permission::create(['name' => '/admin/cliente/actualizarcliente/',
        'description' => 'EDITAR CLIENTES'])->syncRoles([$role1, $role2]);               //Permiso para autorizar si el usuario podra editar o no el modulo
        Permission::create(['name' => '/admin/cliente/eliminarcliente/',
        'description' => 'ELIMINAR CLIENTES'])->syncRoles([$role1, $role2]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo 


        Permission::create(['name' => '/admin/empleado/verempleado',
        'description' => 'VER EMPLEADOS'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo
        Permission::create(['name' => '/admin/empleado/insertarempleado',
        'description' => 'AGREGAR EMPLEADOS'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo 
        Permission::create(['name' => '/admin/empleado/actualizarempleado/',
        'description' => 'EDITAR EMPLEADOS'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo
        Permission::create(['name' => '/admin/empleado/eliminarempleado/',
        'description' => 'ELIMINAR EMPLEADOS'])->syncRoles([$role1]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo 


        Permission::create(['name' => '/admin/facturacion/verfacturacion',
        'description' => 'VER FACTURAS'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo
        Permission::create(['name' => '/admin/facturacion/insertarfacturacion',
        'description' => 'AGREGAR FACTURAS'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo 


        Permission::create(['name' => '/admin/catalogo/vercatalogo',
        'description' => 'VER CÁTALAGOS'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo
        Permission::create(['name' => '/admin/catalogo/insertarfamiliar',
        'description' => 'AGREGAR FAMILIARES'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo 
        Permission::create(['name' => '/admin/catalogo/actualizarfamiliar/',
        'description' => 'EDITAR FAMILIARES'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo
        Permission::create(['name' => '/admin/catalogo/eliminarfamiliar/',
        'description' => 'ELIMINAR FAMILIARES'])->syncRoles([$role1]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo 


        Permission::create(['name' => '/admin/gasto/vergasto',
        'description' => 'VER ADMINISTRACIÓN GASTOS'])->syncRoles([$role1, $role2]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo 
        Permission::create(['name' => '/admin/gasto/insertargasto',
        'description' => 'AGREGAR EN ADMINISTRACIÓN GASTOS'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo
        Permission::create(['name' => '/admin/gasto/actualizargasto/',
        'description' => 'EDITAR EN ADMINISTRACIÓN GASTOS'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo 

        
        Permission::create(['name' => '/admin/inventario/verinventario',
        'description' => 'VER PRODUCTOS'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo inventario/producto
        Permission::create(['name' => '/admin/inventario/insertarinventario',
        'description' => 'AGREGAR PRODUCTOS'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo inventario/producto
        Permission::create(['name' => '/admin/inventario/actualizarinventario/',
        'description' => 'EDITAR PRODUCTOS'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo inventario/producto
        Permission::create(['name' => '/admin/inventario/eliminarinventario/',
        'description' => 'ELIMINAR PRODUCTOS'])->syncRoles([$role1]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo inventario/producto


        Permission::create(['name' => '/admin/material/vermaterial',
        'description' => 'VER MATERIALES'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo inventario/producto
        Permission::create(['name' => '/admin/material/insertarmaterial',
        'description' => 'AGREGAR MATERIALES'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo inventario/producto
        Permission::create(['name' => '/admin/material/actualizarmaterial/',
        'description' => 'EDITAR MATERIALES'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo inventario/producto
        Permission::create(['name' => '/admin/material/eliminarmaterial/',
        'description' => 'ELIMINAR MATERIALES'])->syncRoles([$role1]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo inventario/producto
    

        Permission::create(['name' => '/admin/catalogo/insertarmedida',
        'description' => 'AGREGAR A LISTA DE MEDIDAS'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo
        Permission::create(['name' => '/admin/catalogo/actualizarmedida/',
        'description' => 'EDITAR LISTA DE MEDIDAS'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo 
        Permission::create(['name' => '/admin/catalogo/eliminarmedida/',
        'description' => 'ELIMINAR LISTA DE MEDIDAS'])->syncRoles([$role1]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo 


        Permission::create(['name' => '/admin/pieza/verpieza',
        'description' => 'VER PIEZAS'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo inventario/pieza
        Permission::create(['name' => '/admin/pieza/insertarpieza',
        'description' => 'AGREGAR PIEZAS'])->syncRoles([$role1]);                //Permiso para autorizar si el usuario podra agregar o no en el modulo inventario/pieza
        Permission::create(['name' => '/admin/pieza/eliminarpieza/',
        'description' => 'EDITAR PIEZAS'])->syncRoles([$role1]);                //Permiso para autorizar si el usuario podra editar o no el modulo inventario/pieza
        Permission::create(['name' => '/admin/pieza/actualizarpieza/',
        'description' => 'ELIMINAR PIEZAS'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra eliminar o no el modulo inventario/pieza


        Permission::create(['name' => '/admin/planilla/verplanilla',
        'description' => 'VER PLANILLAS'])->syncRoles([$role1, $role2]);                //Permiso para autorizar si el usuario podra eliminar o no el modulo 
        Permission::create(['name' => '/admin/planilla/insertarplanilla',
        'description' => 'AGREGAR PLANILLAS'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo
        Permission::create(['name' => '/admin/planilla/actualizarplanilla/',
        'description' => 'EDITAR PLANILLAS'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo 


        Permission::create(['name' => '/admin/produccion/verproduccion',
        'description' => 'VER PRODUCCIÓN'])->syncRoles([$role1, $role2]);                   //Permiso para autorizar si el usuario podra eliminar o no el modulo 
        Permission::create(['name' => '/admin/produccion/insertarproduccion',
        'description' => 'AGREGAR PRODUCCIÓN'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo
        Permission::create(['name' => '/admin/produccion/actualizarproduccion/',
        'description' => 'EDITAR PRODUCCIÓN'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo 

        Permission::create(['name' => '/admin/proveedor/verproveedor',
        'description' => 'VER PROVEEDORES'])->syncRoles([$role1, $role2]);      //Permiso para autorizar si el usuario podra ver o no el modulo
        Permission::create(['name' => '/admin/proveedor/insertarproveedor',
        'description' => 'AGREGAR PROVEEDORES'])->syncRoles([$role1]);                //Permiso para autorizar si el usuario podra agregar o no en el modulo
        Permission::create(['name' => '/admin/proveedor/actualizarproveedor/',
        'description' => 'EDITAR PROVEEDORES'])->syncRoles([$role1]);                //Permiso para autorizar si el usuario podra editar o no el modulo 
        Permission::create(['name' => '/admin/proveedor/eliminarproveedor/',
        'description' => 'ELIMINAR PROVEEDORES'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra eliminar o no el modulo
      

        Permission::create(['name' => '/admin/catalogo/insertarpuesto',
        'description' => 'AGREGAR A LISTA DE PUESTOS'])->syncRoles([$role1]);             //Permiso para autorizar si el usuario podra agregar o no en el modulo
        Permission::create(['name' => '/admin/catalogo/actualizarpuesto/',
        'description' => 'EDITAR LISTA DE PUESTOS'])->syncRoles([$role1]);               //Permiso para autorizar si el usuario podra editar o no el modulo 
        Permission::create(['name' => '/admin/catalogo/eliminarpuesto/',
        'description' => 'ELIMINAR LISTA DE PUESTOS'])->syncRoles([$role1]);    //Permiso para autorizar si el usuario podra eliminar o no el modulo 


        Permission::create(['name' => '/admin/Bitacora/verbitacora',
        'description' => 'VER BITÁCORA'])->syncRoles([$role1]);          //Permiso para autorizar si el usuario administrador

        Permission::create(['name' => '/pdfalmacen',
        'description' => 'IMPRIMIR ALMACEN'])->syncRoles([$role1]);                       //id=55
        Permission::create(['name' => '/pdfcliente',
        'description' => 'IMPRIMIR CLIENTE'])->syncRoles([$role1]);                       //id=56
        Permission::create(['name' => '/pdfempleado',
        'description' => 'IMPRIMIR EMPLEADO'])->syncRoles([$role1]);                       //id=57
        Permission::create(['name' => '/pdffacturacion',
        'description' => 'VER IMPRIMIR FACTURACION'])->syncRoles([$role1]);                       //id=58
        Permission::create(['name' => '/pdfgastos',
        'description' => 'IMPRIMIR GASTOS'])->syncRoles([$role1]);                       //id=59
        Permission::create(['name' => '/pdfinventario',
        'description' => 'IMPRIMIR INVENTARIO'])->syncRoles([$role1]);                       //id=60
        Permission::create(['name' => '/pdfmaterial',
        'description' => 'IMPRIMIR MATERIAL'])->syncRoles([$role1]);                       //id=61
        Permission::create(['name' => '/pdfpieza',
        'description' => 'IMPRIMIR PIEZA'])->syncRoles([$role1]);                       //id=62
        Permission::create(['name' => '/pdfplanilla',
        'description' => 'IMPRIMIR PLANILLA'])->syncRoles([$role1]);                       //id=63
        Permission::create(['name' => '/pdfproduccion',
        'description' => 'IMPRIMIR PRODUCCION'])->syncRoles([$role1]);                       //id=64
        Permission::create(['name' => '/pdfproveedor',
        'description' => 'IMPRIMIR PROVEEDOR'])->syncRoles([$role1]);                       //id=65
        Permission::create(['name' => '/pdfbitacora',
        'description' => 'IMPRIMIR BITÁCORA'])->syncRoles([$role1]);

    }
}

