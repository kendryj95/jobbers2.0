<!-- Modal -->
<div class="modal fade" id="modal_educ_expe" tabindex="-1" role="dialog" aria-labelledby="modal_educ_expeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 70%;height: 95%;margin: 0 auto;margin-top: 5%;">
    <div class="modal-content" style="height: 80%;">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_educ_expeLabel">Experiencia laboral</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <div class="social-edit">
          <form id="form_experiencia" method="POST" action="candiexpe">
            <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
            <input type="hidden" id="expe_tipo" value="1" name="tipo" />
            <input type="hidden" id="expe_identificador" name="identificador" value="" />
            <div class="row" style="margin-top: -20px;">
              <div class="col-lg-6">
                <span class="pf-title">Sector</span>
                <div class="pf-field">
                  <select id="expe_sector"  name="sector" data-placeholder="Sector" class="chosen">
                    <option value="">Seleccionar</option>
                    <?php foreach ($area_sectores as $key) {
                      echo '<option value="'.$key->id.'">'.$key->nombre.'</option>';
                    }?> 
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <span class="pf-title">Periodo</span>
                <div class="pf-field col-sm-6" style="margin: 0px;padding: 0px;">
                  <select id="expe_desde" name="desde" data-placeholder="Ingreso" class="chosen">
                    <option value="">Seleccionar</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option> 
                  </select>
                </div>
                <div class="pf-field col-sm-6" style="margin: 0px;padding: 0px;">
                  <select id="expe_hasta" name="hasta" data-placeholder="Egreso" class="chosen">
                    <option value="">Seleccionar</option> 
                    <option value="2018">2018</option> 
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option> 
                  </select>
                </div>
              </div> 

              <div class="col-lg-6">
                <span class="pf-title">Empresa</span>
                <div class="pf-field">
                   <input name="empresa" id="expe_empresa" type="text" name="">
                </div>
              </div>
              <div class="col-lg-6">
                <span class="pf-title">Cargo</span>
                <div class="pf-field" style="">
                    <input type="text" id="expe_cargo" name="cargo"> 
                </div> 
              </div> 
                
              <div class="col-lg-12" style="margin-top: -15px;">
                <span class="pf-title">¿Qué hizo en esta empresa?</span>
                <div class="pf-field">
                    <textarea  id="expe_descripcion" name="descripcion"></textarea>
                   
                </div>
              </div> 
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" onclick="$('#form_experiencia').submit();">Guardar</button>
      </div>
    </div>
  </div>
</div>

