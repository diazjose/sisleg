@csrf

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right"><strong>{{ __('N° Legajo') }}</strong></label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control @error('name') is-invalid @enderror" name="numero"  value="{{ old('numero') }}" required autocomplete="numero" autofocus>

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Tipo') }}</strong></label>

                            <div class="col-md-6">
                                <select id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{ old('tipo') }}" required autocomplete="tipo">
                                    <option disabled>--Seleccionar--</option>
                                    <option value="CENTRO VECINAL">CENTRO VECINAL</option>
                                    <option value="UNION VECINAL">UNION VECINAL</option>
                                    <option value="CLUB">CLUB</option>
                                    <option value="BIBLOTECA">BIBLOTECA</option>
                                    <option value="COOPERADORA">COOPERADORA</option>
                                    <option value="FUNDACION">FUNDACION</option>
                                    <option value="UTE">UTE</option>
                                    <option value="SAPEM">SAPEM</option>
                                    <option value="SAS">SAS</option>
                                    <option value="SAU">SAU</option>
                                    <option value="ASOCIACIONES CIVILES">ASOCIACIONES CIVILES</option>
                                    <option value="SOC. ANONIMA">SOC. ANONIMA</option>
                                    <option value="SOC. EXTRANJE">SOC. EXTRANJE</option>
                                </select>
                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="denominacion" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Denominación') }}</strong></label>

                            <div class="col-md-6">
                                <input id="denominacion" type="text" class="form-control @error('denominacion') is-invalid @enderror" name="denominacion" value="{{ old('denominacion') }}" style="text-transform:uppercase;" required autocomplete="denominacion">

                                @error('denominacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="juridiccion" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Jurisdicción') }}</strong></label>

                            <div class="col-md-6">
                                <select id="juridiccion" class="form-control" name="juridiccion" required>
                                    <option disabled >--Seleccionar--</option>
                                    <option value="Arauco (Aimogasta)">Arauco (Aimogasta)</option>
                                    <option value="Capital (La Rioja)">Capital (La Rioja)</option>
                                    <option value="Castro Barros (Aminga)">Castro Barros (Aminga)</option>
                                    <option value="Chamical (Chamical)">Chamical (Chamical)</option>
                                    <option value="Chilecito (Chilecito)">Chilecito (Chilecito)</option>
                                    <option value="Coronel Felipe Varela (Villa Unión">Coronel Felipe Varela (Villa Unión</option>
                                    <option value="Famatina (Famatina)">Famatina (Famatina)</option>
                                    <option value="General Ángel Vicente Peñaloza (Tama)">General Ángel Vicente Peñaloza (Tama)</option>
                                    <option value="General Belgrano (Olta)">General Belgrano (Olta)</option>
                                    <option value="General Juan Facundo Quiroga (Malanzán)">General Juan Facundo Quiroga (Malanzán)</option>
                                    <option value="General Lamadrid (Villa Castelli)">General Lamadrid (Villa Castelli)</option>
                                    <option value="General Ocampo (Villa Santa Rita de Catuna)">General Ocampo (Villa Santa Rita de Catuna)</option>
                                    <option value="General San Martín (Ulapes)">General San Martín (Ulapes)</option>
                                    <option value="Independencia (Patquía)">Independencia (Patquía)</option>
                                    <option value="Rosario Vera Peñaloza (Chepes)">Rosario Vera Peñaloza (Chepes)</option>
                                    <option value="San Blas de los Sauces (San Blas)">San Blas de los Sauces (San Blas)</option>
                                    <option value="Sanagasta (Villa Sanagasta)">Sanagasta (Villa Sanagasta)</option>
                                    <option value="Vinchina (Villa San José de Vinchina)">Vinchina (Villa San José de Vinchina)</option>
                                </select>
                              </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Dirección') }}</strong></label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" style="text-transform:uppercase;" required autocomplete="direccion">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zona" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Zona') }}</strong></label>

                            <div class="col-md-6">
                                <select id="zona" class="form-control" name="zona" required>
                                    <option value="Todos">Todos</option>
                                    <option value="Este">Este</option>
                                    <option value="Oeste">Oeste</option>
                                    <option value="Sur">Sur</option>
                                    <option value="Norte">Norte</option>
                                </select>
                              </div>
                        </div>

                        <div class="form-group row">
                            <label for="ubicacion" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Ubicación') }}</strong></label>

                            <div class="col-md-6">
                                <input id="ubicacion" type="text" class="form-control @error('ubicacion') is-invalid @enderror" name="ubicacion" value="{{ old('ubicacion') }}" style="text-transform:uppercase;" autocomplete="ubicacion">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resolucion" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Resolución') }}</strong></label>

                            <div class="col-md-6">
                                <input id="resolucion" type="text" class="form-control" name="resolucion" value="{{ old('resolucion') }}" required autocomplete="resolucion">
                                @error('resolucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Fecha de Inicio') }}</strong></label>

                            <div class="col-md-6">
                                <input id="fecha_inicio" type="date" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required autocomplete="fecha_inicio">
                                @error('fecha_inicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Programa Punto Cero') }}</strong></label>

                            <div class="col-md-6">
                                <select id="zona" class="form-control" name="punto_cero">
                                    <option selected disabled >--Seleccionar--</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>