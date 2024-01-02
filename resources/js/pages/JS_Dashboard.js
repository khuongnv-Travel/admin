function JS_Dashboard(baseUrl, module, action) {
    $("#main_dashboard").attr('class', 'nav-link active');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
}
JS_Dashboard.prototype.loadIndex = function(){
    
}