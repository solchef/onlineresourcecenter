          <div class="col-sm-1 pull-right ">
                <span class="input-group">
                        <p>.</p>
                              <button type="submit" class="btn btn-md btn-primary"> Go!</button>
                         </span>
                     </div>
                <div class="col-sm-2 pull-right ">
                    <div class="input-group">
                          <label>   Select a date:  </label>
                    <input type="date" name="durationfilter" class="input-sm form-control">
                     

                     </div>

                </div>
                  <div class="col-sm-2 pull-right">

                    <div class="input-group">
                      <label>   Job Type:  </label>
                       <select name="jobtypefilter" class="input-sm form-control">
                        <option value="" >Select Job Type</option>
                        @foreach($jobtype as $jobtypes)
                         <option value="{{$jobtypes->id}}">{{$jobtypes->jobtype}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
                <div class="col-sm-2 pull-right ">
                      <label>   Client Mobile or First name:  </label>
                    <div class="input-group">
                        <input type="text" placeholder="Search" name="clientfilter" class="input-sm form-control"> 
                        </div>
                </div>