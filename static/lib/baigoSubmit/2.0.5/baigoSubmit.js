/*
v2.0.5 jQuery baigoSubmit plugin 表单提交插件
(c) 2013 baigo studio - http://www.baigo.net/
License: http://www.opensource.org/licenses/mit-license.php
*/
;(function($){
    $.fn.baigoSubmit = function(options) {
        "use strict";
        if (this.length < 1) {
            return this;
        }

        if (this.length > 1){
            this.each(function(){
                $(this).baigoSubmit(options);
            });
            return this;
        }

        var thisForm    = $(this); //定义表单对象
        var el          = this;
        var _str_conn   = "?";
        var _form_action;
        var _jump_url;
        var _result_attach_value;

        var defaults = {
            class_content: {
                submitting: "alert-info",
                err: "alert-danger",
                success: "alert-success",
            },
            class_icon: {
                submitting: "oi oi-loop-circular bg-spin",
                err: "oi oi-circle-x",
                success: "oi oi-circle-check"
            },
            msg_text: {
                submitting: "Submitting ...",
                err: "Error"
            },
            selector: {
                content: ".bg-content",
                icon: ".bg-icon",
                msg: ".bg-msg",
                submit_btn: ".bg-submit",
                empty_input: ":password"
            },
            confirm: {
                selector: "",
                val: "",
                msg: ""
            },
            box: {
                selector: ".bg-submit-box",
                tpl: "<div class=\"alert alert-dismissible bg-content\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><span class=\"bg-icon\"></span>&nbsp;<span class=\"bg-msg\"></span></div>",
                delay: 5000
            },
            jump: {
                url: "",
                text: "",
                icon: "oi oi-loop-circular bg-spin",
                delay: 3000
            }
        };

        var opts = $.extend(true, defaults, options);

        var _obj_selector = opts.box.selector;
        var _obj_box = $(_obj_selector);
        var _rcode_status, _class, _icon, _str_rcode, _msg_html;

        _obj_box.html(opts.box.tpl);

        $(_obj_selector + " " + opts.selector.content).addClass(opts.class_content.submitting);
        $(_obj_selector + " " + opts.selector.icon).addClass(opts.class_icon.submitting);
        $(_obj_selector + " " + opts.selector.msg).html(opts.msg_text.submitting);

        //调用弹出框
        var callBox = function(_action, _rcode, _msg, _attach_value) {
            switch(_action) {
                case "pre":
                    $(_obj_selector + " " + opts.selector.content).removeClass(opts.class_content.submitting + " " + opts.class_content.err + " " + opts.class_content.success);
                    $(_obj_selector + " " + opts.selector.content).addClass(opts.class_content.submitting);

                    $(_obj_selector + " " + opts.selector.icon).removeClass(opts.class_icon.submitting + " " + opts.class_icon.err + " " + opts.class_icon.success);
                    $(_obj_selector + " " + opts.selector.icon).addClass(opts.class_icon.submitting);

                    $(_obj_selector + " " + opts.selector.msg).html(opts.msg_text.submitting);

                    _obj_box.slideDown();

                    $(opts.selector.submit_btn).attr("disabled", true);
                break;

                case "err":
                    $(_obj_selector + " " + opts.selector.content).removeClass(opts.class_content.submitting + " " + opts.class_content.err + " " + opts.class_content.success);
                    $(_obj_selector + " " + opts.selector.content).addClass(opts.class_content.err);

                    $(_obj_selector + " " + opts.selector.icon).removeClass(opts.class_icon.submitting + " " + opts.class_icon.err + " " + opts.class_icon.success);

                    $(_obj_selector + " " + opts.selector.icon).addClass(opts.class_icon.err);

                    $(_obj_selector + " " + opts.selector.msg).html(opts.msg_text.err + "&nbsp;status:&nbsp;" + _msg);
                break;

                case "success":
                    if (typeof _rcode == "undefined" || _rcode === null) {
                        _rcode = "x";
                    }

                    _rcode_status  = _rcode.substr(0, 1);

                    switch (_rcode_status) {
                        case "x":
                            _class      = opts.class_content.err;
                            _icon       = opts.class_icon.err;
                            _str_rcode  = _rcode;
                        break;

                        case "y":
                            _class      = opts.class_content.success;
                            _icon       = opts.class_icon.success;
                            _str_rcode  = "";
                        break;
                    }

                    _msg_html = _str_rcode;

                    if (typeof _msg != "undefined") {
                        _msg_html = _msg + "&nbsp;" + _str_rcode;
                    }

                    if (_rcode_status == "y" && typeof opts.jump.url != "undefined" && opts.jump.url.length > 0 && typeof opts.jump.text != "undefined") {
                        _jump_url = opts.jump.url;

                        if (typeof opts.jump.attach_key != "undefined" && typeof _attach_value != "undefined") {
                            if (_jump_url.indexOf("?")) {
                                _str_conn = "&";
                            } else {
                                _str_conn = "?";
                            }

                            _jump_url = _jump_url + _str_conn + opts.jump.attach_key + "=" + _attach_value;
                        }

                        _msg_html = _msg_html + "&nbsp;<a class=\"alert-link\" href=\"" + _jump_url + "\">" + opts.jump.text + "</a>";
                        _icon = opts.jump.icon;
                    }

                    $(_obj_selector + " " + opts.selector.content).removeClass(opts.class_content.submitting + " " + opts.class_content.err + " " + opts.class_content.success);
                    $(_obj_selector + " " + opts.selector.content).addClass(_class);

                    $(_obj_selector + " " + opts.selector.icon).removeClass(opts.class_icon.submitting + " " + opts.class_icon.err + " " + opts.class_icon.success);

                    $(_obj_selector + " " + opts.selector.icon).addClass(_icon);

                    $(_obj_selector + " " + opts.selector.msg).html(_msg_html);

                    if (_rcode_status == "y") {
                        $(opts.selector.empty_input).val("");

                        if (typeof opts.jump.url != "undefined" && opts.jump.url.length > 0) {
                            setTimeout(function(){
                                window.location.href = _jump_url;
                            }, opts.jump.delay);
                        }
                    }
                break;

                default:
                    _obj_box.slideUp();

                    $(opts.selector.submit_btn).removeAttr("disabled");
                break;
            }
        };

        //确认消息
        var formConfirm = function() {
            if (typeof opts.confirm.selector == "undefined" || opts.confirm.selector === null) {
                return true;
            } else {
                _form_action = $(opts.confirm.selector).val();
                if (_form_action == opts.confirm.val) {
                    if (confirm(opts.confirm.msg)) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return true;
                }
            }
        };

        //ajax 提交
        el.formSubmit = function() {
            if (formConfirm()) {
                if (opts.ajax_url.indexOf("?")) {
                    _str_conn = "&";
                } else {
                    _str_conn = "?";
                }
                $.ajax({
                    url: opts.ajax_url + _str_conn + new Date().getTime() + "at" + Math.random(), //url
                    //async: false, //设置为同步
                    type: "post",
                    dataType: "json", //数据格式为json
                    data: $(thisForm).serialize(),
                    beforeSend: function(){
                        callBox("pre"); //输出正在提交
                    }, //输出消息
                    error: function(_result){
                        callBox("err", "", _result.status); //输出消息
                        setTimeout(function(){
                            callBox();
                        }, opts.box.delay);
                    },
                    success: function(_result){ //读取返回结果
                        if (typeof opts.jump.attach_key != "undefined" && typeof _result[opts.jump.attach_key] != "undefined") {
                            _result_attach_value = _result[opts.jump.attach_key];
                        }

                        callBox("success", _result.rcode, _result.msg, _result_attach_value); //输出消息
                        setTimeout(function(){
                            callBox();
                        }, opts.box.delay);
                    }
                });
            }
        };

        return this;
    };

})(jQuery);