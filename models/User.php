<?php
 
 class User
 {
    private $dbh;          
    private $id_user;         
    private $tipo_doc_usu;        
    private $num_doc_usu;       
    private $nombre_usu;       
    private $apellidos_usu;   
    private $telefono_usu;  
    private $correo_usu;       
    private $pwd;  
    private $rol_usu;
    private $empresa_usu; 
    private $ultimo_ingreso_usu;
    private $fecha_crea_usu;
    private $ultimo_update_usu;
    private $ultimo_del_usu;        

    public function __construct() {
        try {
            $this->dbh = DataBase::connection();   
            $a = func_get_args();                  
            $i = func_num_args();                  
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);  
            }
        } catch (Exception $e) { 
            echo $e->getMessage();  
        }
    }

    # constructor para login
    public function __construct2($userLastEmail, $userPass){
        $this -> userLastEmail = $userLastEmail;
        $this -> userPass = $userPass;
    } 


    // Constructor ajustado para los nuevos atributos
    public function __construct14($id_user, $tipo_doc_usu, $num_doc_usu, $nombre_usu, $apellidos_usu, $telefono_usu, $correo_usu, $pwd, $rol_usu, $empresa_usu, $ultimo_ingreso_usu, $fecha_crea_usu, $ultimo_update_usu, $ultimo_del_usu) {
        $this->id_user = $id_user;
        $this->tipo_doc_usu = $tipo_doc_usu;
        $this->num_doc_usu = $num_doc_usu;
        $this->nombre_usu = $nombre_usu;
        $this->apellidos_usu = $apellidos_usu;
        $this->telefono_usu = $telefono_usu;
        $this->correo_usu = $correo_usu;
        $this->pwd = $pwd;
        $this->rol_usu = $rol_usu;
        $this->empresa_usu = $empresa_usu;
        $this->ultimo_ingreso_usu = $ultimo_ingreso_usu;
        $this->fecha_crea_usu = $fecha_crea_usu;
        $this->ultimo_update_usu = $ultimo_update_usu;
        $this->ultimo_del_usu = $ultimo_del_usu;
    }

    // Getter y Setter para $dbh
    public function getDbh() {
        return $this->dbh;
    }
    
    public function setDbh($dbh) {
        $this->dbh = $dbh;
    }
    
        // Getter y Setter para $id_user
    public function getIdUser() {
        return $this->id_user;
    }
    
    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }
    
        // Getter y Setter para $tipo_doc_usu
    public function getTipoDocUsu() {
        return $this->tipo_doc_usu;
    }
    
    public function setTipoDocUsu($tipo_doc_usu) {
        $this->tipo_doc_usu = $tipo_doc_usu;
    }
    
        // Getter y Setter para $num_doc_usu
    public function getNumDocUsu() {
        return $this->num_doc_usu;
    }
    
    public function setNumDocUsu($num_doc_usu) {
        $this->num_doc_usu = $num_doc_usu;
    }
    
        // Getter y Setter para $nombre_usu
    public function getNombreUsu() {
        return $this->nombre_usu;
    }
    
    public function setNombreUsu($nombre_usu) {
        $this->nombre_usu = $nombre_usu;
    }
    
        // Getter y Setter para $apellidos_usu
    public function getApellidosUsu() {
        return $this->apellidos_usu;
    }
    
    public function setApellidosUsu($apellidos_usu) {
        $this->apellidos_usu = $apellidos_usu;
    }
    
        // Getter y Setter para $telefono_usu
    public function getTelefonoUsu() {
        return $this->telefono_usu;
    }
    
    public function setTelefonoUsu($telefono_usu) {
        $this->telefono_usu = $telefono_usu;
    }
    
        // Getter y Setter para $correo_usu
    public function getCorreoUsu() {
        return $this->correo_usu;
    }
    
    public function setCorreoUsu($correo_usu) {
        $this->correo_usu = $correo_usu;
    }
    
        // Getter y Setter para $pwd
    public function getPwd() {
        return $this->pwd;
    }
    
    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }
    
        // Getter y Setter para $rol_usu
    public function getRolUsu() {
        return $this->rol_usu;
    }
    
    public function setRolUsu($rol_usu) {
        $this->rol_usu = $rol_usu;
    }
    
        // Getter y Setter para $empresa_usu
    public function getEmpresaUsu() {
        return $this->empresa_usu;
    }
    
    public function setEmpresaUsu($empresa_usu) {
        $this->empresa_usu = $empresa_usu;
    }
    
        // Getter y Setter para $ultimo_ingreso_usu
    public function getUltimoIngresoUsu() {
        return $this->ultimo_ingreso_usu;
    }
    
    public function setUltimoIngresoUsu($ultimo_ingreso_usu) {
        $this->ultimo_ingreso_usu = $ultimo_ingreso_usu;
    }
    
        // Getter y Setter para $fecha_crea_usu
    public function getFechaCreaUsu() {
        return $this->fecha_crea_usu;
    }
    
    public function setFechaCreaUsu($fecha_crea_usu) {
        $this->fecha_crea_usu = $fecha_crea_usu;
    }
    
        // Getter y Setter para $ultimo_update_usu
    public function getUltimoUpdateUsu() {
        return $this->ultimo_update_usu;
    }
    
    public function setUltimoUpdateUsu($ultimo_update_usu) {
        $this->ultimo_update_usu = $ultimo_update_usu;
    }
    
        // Getter y Setter para $ultimo_del_usu
    public function getUltimoDelUsu() {
        return $this->ultimo_del_usu;
    }
    
    public function setUltimoDelUsu($ultimo_del_usu) {
        $this->ultimo_del_usu = $ultimo_del_usu;
    }
        




     // *** 2da parte. persistencia BD (CRUD) *** //
     
    #registrar
    public function userCreate() {
        try {
            // SQL para insertar un nuevo registro en la tabla USERS
            $sql = 'INSERT INTO USERS (rol_code,user_code,user_name,user_last_name,user_email,user_pass,user_status) 
                    VALUES (:rol_code,:user_code,:user_name,:user_last_name,:user_email,:user_pass,:user_status)';
            
            // Prepara la consulta SQL utilizando la conexión a la base de datos
            $stmt = $this->dbh->prepare($sql);
            
            // Asocia los valores de los parámetros a las variables correspondientes
            $stmt->bindValue(':rol_code', $this->getRolCode()); // Obtiene el rol del usuario
            $stmt->bindValue(':user_code', $this->getUserCode()); // Obtiene el código del usuario
            $stmt->bindValue(':user_name', $this->getUserName()); // Obtiene el nombre del usuario
            $stmt->bindValue(':user_last_name', $this->getUserLastName()); // Obtiene el apellido del usuario
            $stmt->bindValue(':user_email', $this->getUserLastEmail()); // Obtiene el correo electrónico del usuario
            $stmt->bindValue(':user_pass', $this->getUserPass()); // Obtiene la contraseña del usuario
            $stmt->bindValue(':user_status', $this->getUserStatus()); // Obtiene el estado del usuario
            
            // Ejecuta la consulta de inserción
            $stmt->execute();
            
            echo "Usuario registrado exitosamente!";
        } catch (Exception $e) {
            // Si ocurre un error durante la ejecución de la consulta, se captura la excepción y se muestra el mensaje
            die("Error al registrar usuario: " . $e->getMessage());
        }
    }
    

     #consultar
        # caso de uso 10 -  leer rol
        #CLIXX Consultar Roles
    public function userRead(){
        try {
            $rollist = [];
            $sql = 'SELECT * FROM USERS';
            $stmt = $this -> dbh -> query($sql);
            foreach ($stmt -> fetchAll() as $user) {
                $userlist[] = new User (
                $user['rol_code'],
                $user['user_code'],
                $user['user_name'],
                $user['user_last_name'],
                $user['user_email'],
                $user['user_pass'],
                $user['user_status']

                );
            }
            return $userlist;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }


     #obtener por id
     #actualizar
     #eliminar

 }

?>