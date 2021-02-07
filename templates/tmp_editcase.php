<?php

//initial config
DatabaseConnect();
$prt = new TTextList($GLOBALS['connection']);
$pid="";
$ptitle = "";
$pcat = "";
$pdesc = "";

$catVal=array(
    "All"=>0,
    "Accidents"=>1,
    "Bankrupcy"=>2,
    "Business Contracts"=>3,
    "Capital Market"=>4,
    "Child Welfare"=>5,
    "Copyrights"=>6,
    "Criminal Code"=>7,
    "Family Law"=>8,
    "Immigration"=>9,
    "Public Health"=>10
);

//handle page related actions
if(isset($_POST["editcase"])){
    $prt->getById(htmlspecialchars($_POST["editcase"]));
    $pid = $prt->getData("id");
    $ptitle = $prt->getData("title");
    $pcat = $prt->getData("category");
    $pdesc = $prt->getData("description");
}
else if(isset($_POST["saveitem"])
&& isset($_POST["ptitle"])
&& isset($_POST["pcat"])
&& isset($_POST["pdesc"])
&& !empty($_POST["ptitle"])
&& !empty($_POST["pcat"])
&& !empty($_POST["pdesc"])){
    if(isset($_POST["pid"])){
        $prt->setData("id",htmlspecialchars($_POST["pid"]));
    }    
    $prt->setData("title",htmlspecialchars($_POST["ptitle"]));
    $prt->setData("category",array_flip($catVal)[htmlspecialchars($_POST["pcat"])]);        
    $prt->setData("description",htmlspecialchars($_POST["pdesc"]));    
    $prt->save();
}

?>


<section class="user-s1 align-items-center d-flex container-fluid text-shadow bg-secondary minh-30vh border-bottom border-primary">
</section>
<section class="user-s2 container-fluid d-flex align-items-start justify-content-center py-5 minh-70vh">
    <form action=""
        autocomplete="off"
        class="form-user w-100"
        method="post">
        <div class="row minh-70vh">
            <div class="col-12 col-sm-4 col-md-3 mb-3">
                <div class="list-group">
                    <input class="list-group-item list-group-item-action"
                        name="dashboard"
                        type="submit"
                        value="Dashboard">  
                    <input class="list-group-item list-group-item-action"
                        name="cases"
                        type="submit"
                        value="Cases">  
                    <input class="list-group-item list-group-item-action"
                        name="messages"
                        type="submit"
                        value="Messages">      
                    <?php 
                        if(isset($_SESSION["UserLogged"])
                        && $_SESSION["UserLogged"]==="administrator"){
                    ?>                      
                    <input class="list-group-item list-group-item-action"
                        name="users"
                        type="submit"
                        value="Users">          
                    <?php } ?>                 
                    <input class="list-group-item list-group-item-action"
                        name="logout"
                        type="submit"                                
                        value="Logout">
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-9">
                <div class="card w-100 mb-3">
                    <div class="card-header">
                        <small class="text-muted">Add / modify case</small>
                    </div>
                    <div class="card-body px-4" id="userdatapanel">
                        <input type="hidden" 
                            name="pid" 
                            value="<?php echo $pid; ?>">
                        <div class="form-group row">
                            <label class="col-12 col-sm-4 col-md-3 col-lg-2 col-form-label">Title:</label>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                                <input class="form-control text-center border-gray"
                                    name="ptitle"
                                    type="text"
                                    maxlength="100"
                                    tabindex="1"
                                    value="<?php echo $ptitle; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-4 col-md-3 col-lg-2 col-form-label">Category:</label>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                                <select class="w-100 text-md outline-none"
                                    name="pcat"
                                    tabindex="2">
                                    <option value="0" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="0")echo "selected"; ?>>
                                        All
                                    </option>
                                    <option value="1" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="1")echo "selected"; ?>>
                                        Accidents
                                    </option>
                                    <option value="2" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="2")echo "selected"; ?>>
                                        Bankrupcy
                                    </option>
                                    <option value="3" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="3")echo "selected"; ?>>
                                        Business Contracts
                                    </option>
                                    <option value="4" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="4")echo "selected"; ?>>
                                        Capital Market
                                    </option>
                                    <option value="5" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="5")echo "selected"; ?>>
                                        Child Welfare
                                    </option>
                                    <option value="6" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="6")echo "selected"; ?>>
                                        Copyrights
                                    </option>
                                    <option value="7" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="7")echo "selected"; ?>>
                                        Criminal Code
                                    </option>
                                    <option value="8" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="8")echo "selected"; ?>>
                                        Family Law
                                    </option>
                                    <option value="9" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="9")echo "selected"; ?>>
                                        Immigration
                                    </option>
                                    <option value="10" <?php if(isset($catVal[$pcat]) && $catVal[$pcat]=="10")echo "selected"; ?>>
                                        Public Health
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-4 col-md-3 col-lg-2 col-form-label">Description:</label>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                                <textarea class="form-control text-center w-100 border-gray text-left"
                                    name="pdesc"
                                    maxlength="250"
                                    tabindex="3"><?php echo $pdesc; ?></textarea>
                            </div>
                        </div>
                        <div class="my-2 border-bottom border-secondary pb-3">
                            <small class="text-muted">
                                *Fields cannot be empty, otherwise changes will not be saved
                            </small>
                        </div>
                        <button class="btn btn-outline-dark float-left"
                            name="cases"
                            tabindex="7"
                            type="submit">
                            Back
                        </button>
                        <button class="btn btn-outline-dark float-right"
                            name="saveitem"
                            tabindex="5"
                            type="submit">
                            Save
                        </button>
                        <button class="btn btn-outline-dark float-right mx-3"
                            name="clearform"
                            tabindex="6"
                            type="clear">
                            Clear
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>