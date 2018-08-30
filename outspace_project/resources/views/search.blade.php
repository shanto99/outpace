@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form">
                            <div class="form-group">
                                <label class="control-label" for="select_a_bank">Issuing Bank</label>
                                <div>
                                    <select id="select_a_bank" class="form-control">
                                        <option value="c-plus-plus">C++</option>
                                        <option value="css">CSS</option>
                                        <option value="java">Java</option>
                                        <option value="javascript">JavaScript</option>
                                        <option value="php">PHP</option>
                                        <option value="python">Python</option>
                                        <option value="ruby">Ruby</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="factory_address">Factory Address</label>
                                <input id="old_password" class="form-control" type="password">
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Search</button>
                        </form>

                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Part/Ammendment</th>
                        <th>Detail</th>
                        <th>Delete</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <p>1</p>
                        </td>
                        <td class="maw-320">
                            <p>none</p>
                        </td>
                        <td data-order="3"><button class="btn btn-primary btn-block" type="submit">Detail</button></td>
                        <td data-order="1"><button class="btn btn-primary btn-block" type="submit">Delete</button></td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>2</p>
                        </td>
                        <td class="maw-320">
                            <p>none</p>
                        </td>
                        <td data-order="3"><button class="btn btn-primary btn-block" type="submit">Detail</button></td>
                        <td data-order="1"><button class="btn btn-primary btn-block" type="submit">Delete</button></td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>3</p>
                        </td>
                        <td class="maw-320">
                            <p>Here is part ammendment</p>
                        </td>
                        <td data-order="3"><button class="btn btn-primary btn-block" type="submit">Detail</button></td>
                        <td data-order="1"><button class="btn btn-primary btn-block" type="submit">Delete</button></td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>111</p>
                        </td>
                        <td class="maw-320">
                            <p>Here is part ammendment</p>
                        </td>
                        <td data-order="3"><button class="btn btn-primary btn-block" type="submit">Detail</button></td>
                        <td data-order="1"><button class="btn btn-primary btn-block" type="submit">Delete</button></td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>111</p>
                        </td>
                        <td class="maw-320">
                            <p>Here is part ammendment</p>
                        </td>
                        <td data-order="3"><button class="btn btn-primary btn-block" type="submit">Detail</button></td>
                        <td data-order="1"><button class="btn btn-primary btn-block" type="submit">Delete</button></td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>111</p>
                        </td>
                        <td class="maw-320">
                            <p>Here is part ammendment</p>
                        </td>
                        <td data-order="3"><button class="btn btn-primary btn-block" type="submit">Detail</button></td>
                        <td data-order="1"><button class="btn btn-primary btn-block" type="submit">Delete</button></td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>111</p>
                        </td>
                        <td class="maw-320">
                            <p>Here is part ammendment</p>
                        </td>
                        <td data-order="3"><button class="btn btn-primary btn-block" type="submit">Detail</button></td>
                        <td data-order="1"><button class="btn btn-primary btn-block" type="submit">Delete</button></td>
                        <td>

                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection