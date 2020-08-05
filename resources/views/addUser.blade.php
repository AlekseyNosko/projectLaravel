
                        <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduserLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="adduserLabel">Добавление пользователя</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        {{--                                                    <!-- Контейнер, в котором можно создавать классы системы сеток -->--}}
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <input type="text" id= "log" value ="" placeholder="Логин" class="form-control input-xl-3 login"
                                                       name="addlogin" >
                                            </div>
                                            <div class="col-xl-4">
                                                <input type="text" value ="" placeholder="Email" class="form-control input-xl-3 email"
                                                       name="addemail" >
                                            </div>
                                            <div class="col-xl-4">
                                                 <input type="password" value ="" placeholder="Пароль" class="form-control input-xl-3 pass" name="addpassword">
                                             </div>
                                        </div>
                                    </div>


                                    {{--                                            </div>--}}
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                        <button type="button" class="btn btn-primary save_adduser">Добавить</button>
                                    </div>
                                </div>
                            </div>
                        </div>

