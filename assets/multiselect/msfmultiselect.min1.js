/* MSFmultiSelect v2.3 | Copyright (c) 2020 Mini Super Files | https://github.com/minisuperfiles/MSFmultiSelect/blob/master/LICENSE */ class MSFmultiSelect{constructor(e,t={}){this.select=e,this.select.multiple=!0,this.select.style.display="none",this.settings=this._getSettings(t);this.class={prefix:"msf_multiselect",rootContainer:"msf_multiselect_container",logger:"logger",searchBox:"searchbox",list:"msf_multiselect"},this.data={},this.create(),this.log()}_getSettings(e){var t,s,i={theme:"theme1",width:"350px",height:"40px",appendTo:"__auto__",className:"",placeholder:"",autoHide:!0},l=Object.keys(i),n=l.length;for(t=0;t<n;t++)(s=l[t])&&void 0!==e[s]||(e[s]=i[s]);return e.width=this._setpixel(e.width),e.height=this._setpixel(e.height),e}_setpixel(e){if(e)return isNaN(e)?e:e+"px"}_getTarget(e){return"__auto__"==e&&this.select.parentElement?this.select.parentElement:document.querySelector(this.settings.appendTo)}create(){var e=this,t=this._getTarget(this.settings.appendTo),s=document.createElement("DIV");if(s.className=this.class.rootContainer,s.id=this.class.prefix+(document.querySelectorAll("."+this.class.rootContainer).length+1),"theme1"===this.settings.theme?this._getThemeOneSpecificElems(s):this._getThemeTwoSpecificElems(s),this._getCommonElems(s),this.container=s,t.contains(this.select)?t.insertBefore(s,this.select):t.appendChild(s),document.addEventListener("click",function(t){var s="theme1"!==e.settings.theme&&"closeBtn"===t.target.className;e.container.contains(t.target)||s||(e.settings.autoHide&&e.list.classList.add("hidden"),e.logger.classList.remove("open"))}),this.settings.searchBox){var i=this._search.bind("",e);this.searchBox.addEventListener("keyup",i)}}_search(e,t){var s=t.target.value.toLocaleLowerCase(),i=e.list.querySelectorAll("li:not([class*=ignore])");if(e._showAllOptions(),e.toggleSelectAllBtn(!1),!(s.length<1)){var l,n,a=i.length,h=!0,c=0;for(l=0;l<a;l++)-1!=(n=i[l]).innerText.toLocaleLowerCase().indexOf(s)?(n.firstChild.checked||(h=n.firstChild.checked),c++):n.parentElement.classList.add("hidden");h=0!=c&&h,e.toggleSelectAllBtn(h)}}toggleSelectAllBtn(e){this.settings.searchBox&&(this.list.querySelector('li.ignore input[type="checkbox"]').checked=e)}_handleSearchBox(){this.settings.searchBox&&(this.searchBox.value&&(this.searchBox.value="",this._showAllOptions()),this.searchBox.focus())}setValue(e=[],t=!1){if(e.length){var s,i,l,n,a,h,c=this.select.children.length;e.length;for(n=this._getSearchableLi(this.list),a=0;a<c;a++)for(h=0;h<e.length;h++)if(s=this.select.children[a],l=e[h],s.value==l){s.selected=!0,(i=n[a]).children[0].checked=!0,i.classList.add("active"),this.data[a]=!0,t&&"function"==typeof this.settings.onChange&&this.settings.onChange(!0,s.value,this);break}this.log(),this.searchValClear()}}removeValue(e=[],t=!1){if(e.length){var s,i,l,n,a,h,c=this.select.children.length,r=e.length;for(n=this._getSearchableLi(this.list),a=0;a<c;a++)for(h=0;h<r;h++)if(s=this.select.children[a],l=e[h],s.value==l){s.selected=!1,(i=n[a]).children[0].checked=!1,i.classList.remove("active"),this.data[a]=!1,t&&"function"==typeof this.settings.onChange&&this.settings.onChange(!1,s.value,this);break}this.log(),this.searchValClear()}}searchValClear(){this.settings.searchBox&&(this._getLi(this.list,"label:not(.hidden) li:not(.ignore)"),this._getLi(this.list,"label:not(.hidden) li.active:not(.ignore)").length||this._handleSearchBox())}log(){"theme1"===this.settings.theme?this._ThemeOneSpecific_log():this._ThemeTwoSpecific_log()}getData(){var e,t=[],s=this.select.children.length;for(e=0;e<s;e++)this.select.children[e].selected&&t.push(this.select.children[e].value);return t}selectAll(e=!1){var t,s,i,l=[];for(i=(s=this.list.querySelectorAll("label:not(.hidden) li:not(.ignore) input")).length,t=0;t<i;t++)l.push(s[t].value);e?this.setValue(l):this.removeValue(l),"function"==typeof this.settings.afterSelectAll&&this.settings.afterSelectAll(e,l,this)}loadSource(e=[]){if(e.length){this.select.innerHTML="";var t,s,i,l=e.length;for(t=0;t<l;t++)i=e[t],(s=document.createElement("OPTION")).value=i.value,s.innerHTML=i.caption,s.selected=i.selected,this.select.appendChild(s);this.reload()}}getSource(){var e,t,s=[],i=this.select.children,l=i.length;for(e=0;e<l;e++)t=i[e],s.push({value:t.value,caption:t.innerText,selected:t.selected});return s}reload(){this.container.remove(),this.create()}_showAllOptions(){this.list.classList.contains("hidden")&&this.list.classList.remove("hidden");var e,t=this._getSearchableLi(this.list),s=t.length;for(e=0;e<s;e++)t[e].parentElement.classList.remove("hidden")}_getCommonElems(e){var t,s,i,l,n,a,h,c,r=this,o=this.select.children.length;for((s=document.createElement("UL")).className=this.class.list,s.style.width=this.settings.width,this.settings.autoHide?s.classList.add("hidden"):s.classList.add("offdropdown"),this.settings.searchBox&&(l=document.createElement("label"),(i=document.createElement("LI")).classList.add("ignore"),(t=document.createElement("input")).type="text",t.placeholder="Search",t.className=this.class.searchBox,i.appendChild(t),l.appendChild(i),s.appendChild(l),this.searchBox=t),this.settings.selectAll&&(l=document.createElement("label"),(i=document.createElement("LI")).classList.add("ignore"),(n=document.createElement("input")).type="checkbox",n.disabled=!!this.settings.readOnly,n.addEventListener("click",function(){var e=this.checked?"add":"remove";this.parentElement.classList[e]("active"),r.selectAll(this.checked)}),a=document.createTextNode(" Select All"),i.appendChild(n),i.appendChild(a),l.appendChild(i),s.appendChild(l)),h=0;h<o;h++)c=this.select.children[h],l=document.createElement("label"),i=document.createElement("LI"),(n=document.createElement("input")).type="checkbox",n.disabled=!!this.settings.readOnly,n.value=c.value,a=document.createTextNode(c.innerText),n.addEventListener("click",function(){this.checked?r.setValue([this.value]):r.removeValue([this.value]),"function"==typeof r.settings.onChange&&r.settings.onChange(this.checked,this.value,r)}),i.appendChild(n),i.appendChild(a),i.className=c.selected?"active":"",n.checked=c.selected,this.data[h]=c.selected,l.appendChild(i),s.appendChild(l);e.appendChild(s),this.list=s}_getSearchableLi(e){return e.querySelectorAll("li:not([class*=ignore])")}_getLi(e,t="label"){return e.querySelectorAll(t)}_getThemeOneSpecificElems(e){var t=document.createElement("textarea");this._setLogger(t),t.readOnly=!0,t.placeholder=this.settings.placeholder,e.appendChild(t)}_getThemeTwoSpecificElems(e){var t=document.createElement("span");this._setLogger(t),e.appendChild(t)}_setLogger(e){var t=this;e.style.width=this.settings.width,e.style.height=this.settings.height,e.className=this.class.logger,this.logger=e,e.addEventListener("click",function(){t.settings.autoHide&&t.list.classList.toggle("hidden"),t.logger.classList.toggle("open"),t._handleSearchBox()})}_ThemeOneSpecific_log(){for(var e=0,t="",s="",i=this.select.children.length;e<i;e++)t=this.select.children[e],this.data[e]&&(s+=s?", "+t.innerText:t.innerText);this.logger.value=s}_ThemeTwoSpecific_log(){var e=this,t=e.logger;t.innerHTML="";var s,i,l,n="",a="",h=this.select.children.length;for(s=0;s<h;s++)n=this.select.children[s],this.data[s]&&((i=document.createElement("label")).className="selectedLabels",i.innerHTML=n.innerText,(l=document.createElement("span")).className="closeBtn readOnly",l.innerHTML="&#10005;",l.dataset.id=n.value,e.settings.readOnly||(l.classList.remove("readOnly"),l.addEventListener("click",function(t){t.stopPropagation(),e.removeValue([t.target.dataset.id],!0)})),i.appendChild(l),t.appendChild(i),a+=a?","+n.innerText:n.innerText);this.logger.dataset.value=a}}
