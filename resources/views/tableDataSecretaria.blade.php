@extends('layouts.menuSecretaria')

@section('title', 'Consultar') 

@section('menuSecretaria')

    <!--Ejemplo tabla con DataTables-->
    
    <div class="container container2">
                    <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">        
                                    <table id="example" class="table table-striped table-bordered corredor" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>                           
                                            <th>Carrera</th>
                                            <th>Per-Inicio</th>
                                            <th>Per-Final</th>
                                            <th>Estado</th>
                                            <th class="accion">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td>2300071582</td>
                                            <td>Steeven Eduardo</td>
                                            <td>Orbe Borja</td>                                
                                            <td>tecnologias de la informacion</td>
                                            <td>2017</td>
                                            <td>2022</td>
                                            <td>egresado</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a href="#">Editar</a></button>
                                            </td>
                                        </tr>                
                                        <tr>
                                            <td>23555438868</td>
                                            <td>jeff</td>
                                            <td>JJ pp</td>                                
                                            <td>administracion de empresas</td>
                                            <td>2017</td>
                                            <td>2022</td>
                                            <td>Graduado</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a href="#">Editar</a></button>
                                            </td>
                                        </tr> 
                                       
                                        <tr>
                                            <td>23555412368</td>
                                            <td>jose HH</td>
                                            <td>JJ pp</td>
                                            <td>tecnologias de la informacion</td>
                                            <td>2017</td>
                                            <td>2022</td>
                                            <td>Graduado</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a href="#">Editar</a></button>
                                            </td>
                                        </tr>  
                                      
                                   
                                        <tr>
                                            <td>23555412368</td>
                                            <td>diego de la torre</td>
                                            <td>zambrano</td>
                                            <td>administracion publica</td>
                                            <td>2020</td>
                                            <td>2024</td>
                                            <td>Graduado</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a href="#">Editar</a></button>
                                            </td>
                                        </tr>  
                                      
                                        <tr>
                                            <td>23555412368</td>
                                            <td>carlos perez</td>
                                            <td>zambrano</td>
                                            <td>tecnologias de la informacion</td>
                                            <td>2017</td>
                                            <td>2022</td>
                                            <td>egresado</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a href="#">Editar</a></button>
                                            </td>
                                        </tr>  
                                        <tr>
                                            <td>23555412368</td>
                                            <td>kevin</td>
                                            <td>CAICEDO</td>
                                            <td>tecnologias de la informacion</td>
                                            <td>2017</td>
                                            <td>2022</td>
                                            <td>Graduado</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a href="#">Editar</a></button>
                                            </td>
                                        </tr>  
                                        <tr>
                                            <td>23555412368</td>
                                            <td>Guido</td>
                                            <td>cedeno</td>
                                            <td>tecnologias de la informacion</td>
                                            <td>2017</td>
                                            <td>2022</td>
                                            <td>Graduado</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a href="#">Editar</a></button>
                                            </td>
                                        </tr>       
                                        <tr>
                                            <td>23555412368</td>
                                            <td>Guido2</td>
                                            <td>cedeno</td>
                                            <td>tecnologias de la informacion</td>
                                            <td>2017</td>
                                            <td>2022</td>
                                            <td>Graduado</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a href="#">Editar</a></button>
                                            </td>
                                        </tr>                          
                                    </tbody>        
                                </table>                  
                                </div>
                            </div>
                    </div>  
    </div>
@endsection