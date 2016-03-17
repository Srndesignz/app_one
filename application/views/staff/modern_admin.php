                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>admin area</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 register-div">
                        <?php echo validation_errors();?>
                            <?php echo form_open_multipart('staff/enter');?>
                            <div class="col-md-6">
                                <table class="table">
                                <tr><td>Name: </td><td><input required class="form-control" type="text" id="name" name="name"/></td></tr>
                                <tr><td>Qualification: </td><td>Basic<select class="form-control" type="text" id="basic_qualification" name="basic_qualification">
                                                                    <option value="BTech">BTech</option>
                                                                    <option value="BE">BE</option>
                                                                    <option value="Bsc">Bsc</option>
                                                                    <option value="Msc">Msc</option>
                                                                    <option value="MPhil">MPhil</option>
                                                                    <option value="MTech">MTech</option>
                                                                    <option value="ME">ME</option>
                                                                    <option value="Phd">Phd</option>
                                                                </select>Specialisation<input class="form-control" type="text" id="specialisation" name="specialisation"/>
                                                            <a id="add_qualifications_link" href="#">Add</a></td></tr>
                                <tr><td></td><td><textarea readonly placeholder="" class="form-control" type="text" id="all_qualifications" name="all_qualifications"></textarea><a id="clear_qualifications" href="#">Clear</a></td></tr>
                                <tr><td>Department: </td><td><select class="form-control" type="text" id="department" name="department">
                                                                <option value="Computer Science">Computer Science</option>
                                                                <option value="Electronics and Communications">Electronics and Communications</option>
                                                                <option value="Electrical and Electronics">Electrical and Electronics</option>
                                                                <option value="General Engineering">General Engineering</option>
                                                            </select></td></tr>
                                <tr><td>Designation: </td><td><select class="form-control" type="text" id="designation" name="designation">
                                                                <option value="Assistant Professor">Assistant Professor</option>
                                                                <option value="Associate Professor">Associate Professor</option>
                                                                <option value="Professor">Professor</option>
                                                            </select></td></tr>
                                <tr><td>Home Address: </td><td><textarea required class="form-control" type="text" id="address" name="address"></textarea></td></tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                <tr><td>Teaching Experience: </td><td><input required class="form-control" type="text" id="teaching_experience" name="teaching_experience"/></td></tr>
                                <tr><td>Industrial Experience: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="industrial_experience" name="industrial_experience"></textarea></td></tr>
                                <tr><td>Other Experience: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="other_experience" name="other_experience"></textarea></td></tr>
                                <tr><td>Papers Published: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="papers_published" name="papers_published"></textarea></td></tr>
                                <tr><td>Patents: </td><td><textarea placeholder="Optional" class="form-control" type="text" id="patents" name="patents"></textarea></td></tr>
                                <tr><td>Website/Blog: </td><td><input placeholder="Optional" type="text" id="blog" name="blog" class="form-control"/></td></tr>
                                <tr><td>Email: </td><td><input required autocomplete="off" class="form-control" type="text" id="email" name="email"/></td><td><div id="email_err"></div></td></tr>
                                <tr><td>Phone: </td><td><input required class="form-control" type="text" id="phone" name="phone"/></td></tr>
                                <tr><td>Photo: </td><td><input type="file" id="photo" name="photo"/></td></tr>
                                <tr><td></td><td><img class="img img-responsive" id="photo_preview" src="<?php echo base_url("assets/css/images/display_avatar.jpg");?>" width="100px"/></td></tr>
                                <tr><td></td><td><input class="btn btn-success" type="submit" name="submit" value="Enter Details"/></td></tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
