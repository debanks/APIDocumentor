<?php
$xml = simplexml_load_file('xml/api.xml');
?>
<html>
    <head>
        <title>API Documentation</title>
        <link rel="stylesheet" href="css/main-api.css" type="text/css" media="projection, screen" />
        <meta name="viewport" content="width=device-width">
        <script src="js/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                $('.show').click(function(){
                    var _this = $(this);
                    $(_this).parent().parent().toggleClass('sel');
                });
                $('.parent-header').click(function(){
                    var _this = $(this);
                    $(_this).parent().toggleClass('sel');
                });
                $('.action').click(function(){
                    var _this = $(this);
                    $(_this).toggleClass('sel');
                });
                $('.definition').click(function(){
                    return false;
                });
                $('.definition a').click(function(e){
                    event.stopPropagation();
                })
            });
        </script>
        
    </head>
    <body>
        <div id="container">
            <div class="bottom">
                <div class="section">
                    <h2 align="center">Your Documentation</h2>
                    
                    <!-- Loop through each Category in the XML -->
                    <?php foreach ($xml->categories->category as $category) { ?>
                        <div class="parent sel">
                            <div class="parent-header">/v1/<?php echo $category->name ?></div><div class="options"><div class="show">Show/Hide</div></div>
                            <hr/>
                            <div class="children">
                                
                                <!-- Display each Function under the categories -->
                                <?php foreach ($category->functions->function as $function) { ?>
                                    <div class="action <?php echo $function->type ?>">
                                        <div class="<?php echo $function->type ?>"><?php echo $function->type ?></div> /<?php echo $category->name . '/' . $function->display ?><div class="description getter"><?php echo $function->shortDescription ?></div>
                                        <div class="definition">
                                            <div class="defin-left">
                                                <h3>Description</h3>
                                                <p><?php echo $function->description ?></p>
                                                <h3>Response Definition</h3>
                                                <b>Response Type</b>: <?php echo $function->return ?><br/><br/>
                                                
                                                <!-- Display all the Classes for the function -->
                                                <?php foreach ($function->classes->class as $class) { ?>
                                                    <div class="model"><?php echo $class->name ?> {</div>
                                                    <div class="value table">
                                                        <?php foreach ($class->values->value as $value) { ?>
                                                            <div class="row">
                                                                <div class="cell"><div class="model-header"><?php echo $value->name ?></div>(<?php echo $value->type ?>)</div> <div class="cell">: <?php echo $value->description ?></div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="model">}</div><br/>
                                                <?php } ?>
                                            </div>
                                            <div class="defin-right">
                                                <h3>Parameters</h3>
                                                <div class="table">
                                                    <div class="row header">
                                                        <div class="cell">Parameter</div><div class="cell">Description</div><div class="cell">Data Type</div>
                                                    </div>
                                                    <?php foreach ($function->parameters->parameter as $parameter) { ?>
                                                        <div class="row norm">
                                                            <div class="cell"><?php echo $parameter->name ?></div><div class="cell"><?php echo $parameter->description ?></div><div class="cell"><?php echo $parameter->type ?></div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <h3>Errors</h3>
                                                <div class="table">
                                                    <div class="row header">
                                                        <div class="cell">Status</div><div class="cell">Message</div>
                                                    </div>
                                                    <?php foreach ($function->errors->error as $error) { ?>
                                                        <div class="row norm">
                                                            <div class="cell"><?php echo $error->status ?></div><div class="cell"><?php echo $error->message ?></div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <h3>Examples</h3>
                                                <div class="table">
                                                    <div class="row header">
                                                        <div class="cell">URL</div><div class="cell">Description</div>
                                                    </div>
                                                    <?php foreach ($function->examples->example as $example) { ?>
                                                        <div class="row norm">
                                                            <div class="cell"><a href="<?php echo $example->url ?>" target="_blank"><?php echo $example->url ?></a></div><div class="cell"><?php echo $example->name ?></div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>
