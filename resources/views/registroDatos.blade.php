@extends('layouts.menuSecretaria')

@section('title', 'Registro Datos') 

@section('menuSecretaria')
    
       
        <div class="main_content">
            

            <div class="table-filtrar">
                <!--****************************************-->
                <form action="#" class="contenedor-form">
                    <fieldset>
                        <legend>Estudiante</legend>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABAL Estudiante -->
                        <input type="number" name="cedula" id="cedula" placeholder="ingresa tu cedula" />
                        <input type="text" name="nombres" id="nombres" placeholder="tus nombres" />
                        <input type="text"  name="apellidos" id="apellidos" placeholder="tus apellidos" />
                        <input type="number" name="telefono" id="telefono" placeholder="tu numero d etelefono" />
                        <label for="carrera">Carrera:
                        <select name="carrera" id="carrera">
                            <option value="TecnologiaInformacion">tecnologias de la informacion</option>
                            <option value="contabilidadAuditoria">Contabilidad y Auditoria</option>
                            <option value="administracionEmpresas">Administracion de Empresas</option>
                            <option value="administracionPublica">Administracion Publica</option>
                        </select>
                        <input type="text" name="nombreCurso" id="nombreCurso" placeholder="Nombre del curso" />
                        <input type="email" name="emailInstitucional" id="emailIntitucional" placeholder="Email Institucuional" />
                        <input type="email" name="emailPersonal" id="emailPersonal" placeholder="tu email Personal" />
                        <label for="estado">Estado:
                        <select name="estado" id="estado">
                            <option value="Tgraduado">Graduado</option>
                            <option value="egresado">Egresado</option>
                            <option value="enproceso">en proceso</option>
                        </select>
                    </fieldset>

                    <fieldset>
                        <legend>Requisitos</legend>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABLA Requisitos -->

                        <label for="ingles">Aprobación de ingles:</label>
                        <select name="ingles" id="ingles">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>

                        <label for="culturaFisica">Aprobación de Cultura fisica:</label>
                        <select name="culturaFisica" id="culturaFisica">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
            

                        <label for="computacion">Aprobación de Computacion:</label>
                        <select name="computacion" id="computacion">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>

                        <label for="Matriculas">Certificados de matriculas:</label>
                        <select name="matriculas" id="matriculas">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>

                        <label for="tituloBachiller">Titulo de bachiller:</label>
                        <select name="tituloBachiller" id="tituloBachiller">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>

                        <label for="documentosPersonales">Documentos personales:</label>
                        <select name="documentosPersonales" id="documentosPersonales">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>

                
        
                    </fieldset>

                    <fieldset>
                        <legend>Periodo</legend>
                        <lable for="inicioPeriodo" >Inicio</lable>
                        <input type="date" name="inicioPeriodo" id="inicioPeriodo"/>
                        <label for="finPeriodo">Finalizacion</label>
                        <input type="date" name="finPeriodo" id="finPeriodo"/>
                        <label for="nombrePeriodo">Perido:</label>
                        <input type="text" name="nombrePeriodo" id="nombrePeriodo" placeholder="Ejemplo -> FebreroIS2017 " />
                    </fieldset>

                    <fieldset>
                        <legend>Facultad</legend>

                        <label for="facultad">Facultad:</label>
                            <select name="facultad" id="facultad">
                                <option value="ingenieria">Ingenieria</option>
                                <option value="cienciasAdministrativas">Ciencias Administrativas y Economicas</option>
                            </select>
                
                    </fieldset>

                    <fieldset>
                        <legend>Carrera</legend>

                        <label for="NombreCarrera">Carrera:
                            <select name="NombreCarrera" id="NombreCarrera">
                                <option value="TecnologiaInformacion">tecnologias de la informacion</option>
                                <option value="contabilidadAuditoria">Contabilidad y Auditoria</option>
                                <option value="administracionEmpresas">Administracion de Empresas</option>
                                <option value="administracionPublica">Administracion Publica</option>
                            </select>
                        <label for="codigoCarrera">Codigo:</label>
                        <input type="text" name="codigoCarrera" id="codigoCarrera" placeholder="Ingresa el codigo de tu carrera" />
                        <label for="duracionCarrera">Niveles:</label>
                        <input type="number" name="duracionCarrera" id="duracionCarrera" placeholder="Ingresa cuantos semestre tiene tu carrera" />
                        <label for="estadoCarrera">Estado:</label>
                        <input type="text" name="estadoCarrera" id="estadoCarrera" placeholder="ingres si esats graduado/egresado" />


                    </fieldset>

                    <div class="contenedor-botones__accion">
                        <button type="button" class="btn btn-guardar">Guardar</button>
                        <button type="button" class="btn btn-eliminar">Eliminar</button>
                    </div>

                </form>
                <!--*****************************************-->
            </div>
        </div>
    
@endsection