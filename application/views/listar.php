<div class="box-info full">
                    <h2>Listado de <strong>Clientes</strong></h2>

                            <div class="data-table-toolbar">
                                    <div class="row">

                                            <div class="col-md-12">
                                                    <div class="toolbar-btn-action">
                                                            <a class="btn btn-success"><i class="fa fa-plus-circle"></i> Nuevo</a>
                                                            <a class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</a>
                                                            <a class="btn btn-primary"><i class="fa fa-refresh"></i> Modificar</a>
                                                    </div>
                                            </div>
                                    </div>
                            </div>

                    <div class="table-responsive">
                            <table data-sortable class="table table-hover table-striped">
                                    <thead>
                                            <tr>
                                                    <th>No</th>
                                                    <th style="width: 30px" data-sortable="false"><input type="checkbox" class="rows-check"></th>
                                                    <th>RFC</th>
                                                    <th>Razón social</th>
                                                    <th>Alias</th>
                                                    <th data-sortable="false">Teléfono</th>
                                                    <th data-sortable="false">Contacto</th>
                                                    <th>País</th>
                                                    <th data-sortable="false">Option</th>
                                            </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $html = '';
                                        foreach($registros as $registro )
                                        {
                                            $html .= '<tr>';
                                            
                                            $html .= '<td>' . $registro->id . '</td>';     
                                            $html .= '<td><input type="checkbox" class="rows-check"></td>';
                                            $html .= '<td>' . $registro->rfc . '</td>';
                                            $html .= '<td>' . $registro->razon_social . '</td>';
                                            $html .= '<td>' . $registro->alias . '</td>';
                                            $html .= '<td>' . $registro->telefono . '</td>';
                                            $html .= '<td>' . $registro->contacto . '</td>';
                                            $html .= '<td>' . $registro->pais . '</td>';
                                            $html .= '<td><div class="btn-group btn-group-xs">';
                                            $html .= '<a data-toggle="tooltip" title="Eliminar" class="btn btn-default"><i class="fa fa-power-off"></i></a>';
                                            $html .= '<a data-toggle="tooltip" title="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a>';
                                            $html .= '</div></td>';
                                            
                                            $html .= '</tr>';
                                        }
                                        echo $html;
                                        ?>                                            
                                            
                                    </tbody>
                            </table>
                    </div>

                    <div class="data-table-toolbar">
                            <ul class="pagination">
                              <li class="disabled"><a href="#">&laquo;</a></li>
                              <li class="active"><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">4</a></li>
                              <li><a href="#">5</a></li>
                              <li><a href="#">&raquo;</a></li>
                            </ul>
                    </div>

            </div>	