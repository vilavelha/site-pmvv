<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<%@ Register Assembly="AjaxControlToolkit" Namespace="AjaxControlToolkit" TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="Server">
    <style type="text/css">
        
        .auto-style4 {
            color: #800000;
        }
        /* link que ainda não foi visitado */
a:link {
   color: red;
}

/* link que foi visitado */
a:visited {
    color: green;
}

/* mouse over */
a:hover {
    color: #000000;
}

/* link selecionado */
a:active {
    color: blue;
}
   color: red;
}

    </style>


    <style>

        <!--

        /* Font Definitions */

        @font-face {
            font-family: Wingdings;
            panose-1: 5 0 0 0 0 0 0 0 0 0;
            mso-font-charset: 2;
            mso-generic-font-family: auto;
            mso-font-pitch: variable;
            mso-font-signature: 0 268435456 0 0 -2147483648 0;
        }

        @font-face {
            font-family: "Cambria Math";
            panose-1: 2 4 5 3 5 4 6 3 2 4;
            mso-font-charset: 1;
            mso-generic-font-family: roman;
            mso-font-format: other;
            mso-font-pitch: variable;
            mso-font-signature: 0 0 0 0 0 0;
        }

        @font-face {
            font-family: Calibri;
            panose-1: 2 15 5 2 2 2 4 3 2 4;
            mso-font-charset: 0;
            mso-generic-font-family: swiss;
            mso-font-pitch: variable;
            mso-font-signature: -520092929 1073786111 9 0 415 0;
        }

        @font-face {
            font-family: "Segoe UI";
            panose-1: 2 11 5 2 4 2 4 2 2 3;
            mso-font-charset: 0;
            mso-generic-font-family: swiss;
            mso-font-format: other;
            mso-font-pitch: variable;
            mso-font-signature: 3 0 0 0 1 0;
        }

        /* Style Definitions */

        p.MsoNormal, li.MsoNormal, div.MsoNormal {
            mso-style-unhide: no;
            mso-style-qformat: yes;
            mso-style-parent: "";
            margin-top: 0cm;
            margin-right: 0cm;
            margin-bottom: 8.0pt;
            margin-left: 0cm;
            line-height: 107%;
            mso-pagination: widow-orphan;
            font-size: 11.0pt;
            font-family: "Calibri","sans-serif";
            mso-ascii-font-family: Calibri;
            mso-ascii-theme-font: minor-latin;
            mso-fareast-font-family: Calibri;
            mso-fareast-theme-font: minor-latin;
            mso-hansi-font-family: Calibri;
            mso-hansi-theme-font: minor-latin;
            mso-bidi-font-family: "Times New Roman";
            mso-bidi-theme-font: minor-bidi;
            mso-fareast-language: EN-US;
        }

        /*h1
	
{mso-style-priority:9;
	
mso-style-unhide:no;
	
mso-style-qformat:yes;
	
mso-style-link:"Título 1 Char";
	
mso-margin-top-alt:auto;
	
margin-right:0cm;
	
mso-margin-bottom-alt:auto;
	
margin-left:0cm;
	
mso-pagination:widow-orphan;
	
mso-outline-level:1;
	
font-size:24.0pt;
	
font-family:"Times New Roman","serif";
	
mso-fareast-font-family:"Times New Roman";
	
font-weight:bold;}*/

        h4 {
            mso-style-noshow: yes;
            mso-style-priority: 9;
            mso-style-qformat: yes;
            mso-style-link: "Título 4 Char";
            mso-style-next: Normal;
            margin-top: 2.0pt;
            margin-right: 0cm;
            margin-bottom: 0cm;
            margin-left: 0cm;
            margin-bottom: .0001pt;
            line-height: 107%;
            mso-pagination: widow-orphan lines-together;
            page-break-after: avoid;
            mso-outline-level: 4;
            font-size: 11.0pt;
            font-family: "Calibri Light","sans-serif";
            mso-ascii-font-family: "Calibri Light";
            mso-ascii-theme-font: major-latin;
            mso-fareast-font-family: "Times New Roman";
            mso-fareast-theme-font: major-fareast;
            mso-hansi-font-family: "Calibri Light";
            mso-hansi-theme-font: major-latin;
            mso-bidi-font-family: "Times New Roman";
            mso-bidi-theme-font: major-bidi;
            color: #2E74B5;
            mso-themecolor: accent1;
            mso-themeshade: 191;
            mso-fareast-language: EN-US;
            font-weight: normal;
            font-style: italic;
        }

        a:link, span.MsoHyperlink {
            mso-style-noshow: yes;
            mso-style-priority: 99;
            color: black;
            text-decoration: underline;
            text-underline: single;
        }

        a:visited, span.MsoHyperlinkFollowed {
            mso-style-noshow: yes;
            mso-style-priority: 99;
            color: #954F72;
            mso-themecolor: followedhyperlink;
            text-decoration: underline;
            text-underline: single;
        }

        p {
            mso-style-priority: 99;
            mso-margin-top-alt: auto;
            margin-right: 0cm;
            mso-margin-bottom-alt: auto;
            margin-left: 0cm;
            mso-pagination: widow-orphan;
            font-size: 12.0pt;
            font-family: "Times New Roman","serif";
            mso-fareast-font-family: "Times New Roman";
        }

            p.MsoAcetate, li.MsoAcetate, div.MsoAcetate {
                mso-style-noshow: yes;
                mso-style-priority: 99;
                mso-style-link: "Texto de balão Char";
                margin: 0cm;
                margin-bottom: .0001pt;
                mso-pagination: widow-orphan;
                font-size: 9.0pt;
                font-family: "Segoe UI","sans-serif";
                mso-fareast-font-family: Calibri;
                mso-fareast-theme-font: minor-latin;
                mso-bidi-font-family: "Segoe UI";
                mso-fareast-language: EN-US;
            }

            p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph {
                mso-style-priority: 34;
                mso-style-unhide: no;
                mso-style-qformat: yes;
                margin-top: 0cm;
                margin-right: 0cm;
                margin-bottom: 8.0pt;
                margin-left: 36.0pt;
                mso-add-space: auto;
                line-height: 107%;
                mso-pagination: widow-orphan;
                font-size: 11.0pt;
                font-family: "Calibri","sans-serif";
                mso-ascii-font-family: Calibri;
                mso-ascii-theme-font: minor-latin;
                mso-fareast-font-family: Calibri;
                mso-fareast-theme-font: minor-latin;
                mso-hansi-font-family: Calibri;
                mso-hansi-theme-font: minor-latin;
                mso-bidi-font-family: "Times New Roman";
                mso-bidi-theme-font: minor-bidi;
                mso-fareast-language: EN-US;
            }

            p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst {
                mso-style-priority: 34;
                mso-style-unhide: no;
                mso-style-qformat: yes;
                mso-style-type: export-only;
                margin-top: 0cm;
                margin-right: 0cm;
                margin-bottom: 0cm;
                margin-left: 36.0pt;
                margin-bottom: .0001pt;
                mso-add-space: auto;
                line-height: 107%;
                mso-pagination: widow-orphan;
                font-size: 11.0pt;
                font-family: "Calibri","sans-serif";
                mso-ascii-font-family: Calibri;
                mso-ascii-theme-font: minor-latin;
                mso-fareast-font-family: Calibri;
                mso-fareast-theme-font: minor-latin;
                mso-hansi-font-family: Calibri;
                mso-hansi-theme-font: minor-latin;
                mso-bidi-font-family: "Times New Roman";
                mso-bidi-theme-font: minor-bidi;
                mso-fareast-language: EN-US;
            }

            p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle {
                mso-style-priority: 34;
                mso-style-unhide: no;
                mso-style-qformat: yes;
                mso-style-type: export-only;
                margin-top: 0cm;
                margin-right: 0cm;
                margin-bottom: 0cm;
                margin-left: 36.0pt;
                margin-bottom: .0001pt;
                mso-add-space: auto;
                line-height: 107%;
                mso-pagination: widow-orphan;
                font-size: 11.0pt;
                font-family: "Calibri","sans-serif";
                mso-ascii-font-family: Calibri;
                mso-ascii-theme-font: minor-latin;
                mso-fareast-font-family: Calibri;
                mso-fareast-theme-font: minor-latin;
                mso-hansi-font-family: Calibri;
                mso-hansi-theme-font: minor-latin;
                mso-bidi-font-family: "Times New Roman";
                mso-bidi-theme-font: minor-bidi;
                mso-fareast-language: EN-US;
            }

            p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast {
                mso-style-priority: 34;
                mso-style-unhide: no;
                mso-style-qformat: yes;
                mso-style-type: export-only;
                margin-top: 0cm;
                margin-right: 0cm;
                margin-bottom: 8.0pt;
                margin-left: 36.0pt;
                mso-add-space: auto;
                line-height: 107%;
                mso-pagination: widow-orphan;
                font-size: 11.0pt;
                font-family: "Calibri","sans-serif";
                mso-ascii-font-family: Calibri;
                mso-ascii-theme-font: minor-latin;
                mso-fareast-font-family: Calibri;
                mso-fareast-theme-font: minor-latin;
                mso-hansi-font-family: Calibri;
                mso-hansi-theme-font: minor-latin;
                mso-bidi-font-family: "Times New Roman";
                mso-bidi-theme-font: minor-bidi;
                mso-fareast-language: EN-US;
            }

        span.Ttulo1Char {
            mso-style-name: "Título 1 Char";
            mso-style-priority: 9;
            mso-style-unhide: no;
            mso-style-locked: yes;
            mso-style-link: "Título 1";
            mso-ansi-font-size: 24.0pt;
            mso-bidi-font-size: 24.0pt;
            font-family: "Times New Roman","serif";
            mso-ascii-font-family: "Times New Roman";
            mso-fareast-font-family: "Times New Roman";
            mso-hansi-font-family: "Times New Roman";
            mso-bidi-font-family: "Times New Roman";
            mso-font-kerning: 18.0pt;
            mso-fareast-language: PT-BR;
            font-weight: bold;
        }

        span.Ttulo4Char {
            mso-style-name: "Título 4 Char";
            mso-style-noshow: yes;
            mso-style-priority: 9;
            mso-style-unhide: no;
            mso-style-locked: yes;
            mso-style-link: "Título 4";
            font-family: "Calibri Light","sans-serif";
            mso-ascii-font-family: "Calibri Light";
            mso-ascii-theme-font: major-latin;
            mso-fareast-font-family: "Times New Roman";
            mso-fareast-theme-font: major-fareast;
            mso-hansi-font-family: "Calibri Light";
            mso-hansi-theme-font: major-latin;
            mso-bidi-font-family: "Times New Roman";
            mso-bidi-theme-font: major-bidi;
            color: #2E74B5;
            mso-themecolor: accent1;
            mso-themeshade: 191;
            font-style: italic;
        }

        span.TextodebaloChar {
            mso-style-name: "Texto de balão Char";
            mso-style-noshow: yes;
            mso-style-priority: 99;
            mso-style-unhide: no;
            mso-style-locked: yes;
            mso-style-link: "Texto de balão";
            mso-ansi-font-size: 9.0pt;
            mso-bidi-font-size: 9.0pt;
            font-family: "Segoe UI","sans-serif";
            mso-ascii-font-family: "Segoe UI";
            mso-hansi-font-family: "Segoe UI";
            mso-bidi-font-family: "Segoe UI";
        }

        span.msoIns {
            mso-style-type: export-only;
            mso-style-name: "";
            text-decoration: underline;
            text-underline: single;
            color: teal;
        }

        span.SpellE {
            mso-style-name: "";
            mso-spl-e: yes;
        }

        .MsoChpDefault {
            mso-style-type: export-only;
            mso-default-props: yes;
            font-family: "Calibri","sans-serif";
            mso-ascii-font-family: Calibri;
            mso-ascii-theme-font: minor-latin;
            mso-fareast-font-family: Calibri;
            mso-fareast-theme-font: minor-latin;
            mso-hansi-font-family: Calibri;
            mso-hansi-theme-font: minor-latin;
            mso-bidi-font-family: "Times New Roman";
            mso-bidi-theme-font: minor-bidi;
            mso-fareast-language: EN-US;
        }

        .MsoPapDefault {
            mso-style-type: export-only;
            margin-bottom: 8.0pt;
            line-height: 107%;
        }

        @page WordSection1 {
            size: 595.3pt 841.9pt;
            margin: 70.85pt 3.0cm 70.85pt 3.0cm;
            mso-header-margin: 35.4pt;
            mso-footer-margin: 35.4pt;
            mso-paper-source: 0;
        }

        div.WordSection1 {
            page: WordSection1;
        }

        /* List Definitions */

        @list l0 {
            mso-list-id: 198979053;
            mso-list-type: hybrid;
            mso-list-template-ids: 757727830 68550657 68550659 68550661 68550657 68550659 68550661 68550657 68550659 68550661;
        }

        @list l0:level1 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l0:level2 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l0:level3 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l0:level4 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l0:level5 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l0:level6 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l0:level7 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l0:level8 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l0:level9 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l1 {
            mso-list-id: 343826826;
            mso-list-template-ids: 1223489644;
        }

        @list l1:level1 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 36.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l1:level2 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 72.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l1:level3 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 108.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l1:level4 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 144.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l1:level5 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 180.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l1:level6 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 216.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l1:level7 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 252.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l1:level8 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 288.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l1:level9 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: 324.0pt;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            mso-ansi-font-size: 10.0pt;
            font-family: Symbol;
        }

        @list l2 {
            mso-list-id: 495148231;
            mso-list-type: hybrid;
            mso-list-template-ids: -260122164 68550657 68550659 68550661 68550657 68550659 68550661 68550657 68550659 68550661;
        }

        @list l2:level1 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l2:level2 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l2:level3 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l2:level4 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l2:level5 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l2:level6 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l2:level7 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l2:level8 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l2:level9 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l3 {
            mso-list-id: 578373081;
            mso-list-type: hybrid;
            mso-list-template-ids: 768753568 -1601396066 68550681 68550683 68550671 68550681 68550683 68550671 68550681 68550683;
        }

        @list l3:level1 {
            mso-level-number-format: arabic-leading-zero;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l3:level2 {
            mso-level-number-format: alpha-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l3:level3 {
            mso-level-number-format: roman-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: right;
            text-indent: -9.0pt;
        }

        @list l3:level4 {
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l3:level5 {
            mso-level-number-format: alpha-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l3:level6 {
            mso-level-number-format: roman-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: right;
            text-indent: -9.0pt;
        }

        @list l3:level7 {
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l3:level8 {
            mso-level-number-format: alpha-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l3:level9 {
            mso-level-number-format: roman-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: right;
            text-indent: -9.0pt;
        }

        @list l4 {
            mso-list-id: 671101250;
            mso-list-type: hybrid;
            mso-list-template-ids: -472580228 68550657 68550659 68550661 68550657 68550659 68550661 68550657 68550659 68550661;
        }

        @list l4:level1 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l4:level2 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l4:level3 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l4:level4 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l4:level5 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l4:level6 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l4:level7 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l4:level8 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l4:level9 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l5 {
            mso-list-id: 1514565166;
            mso-list-type: hybrid;
            mso-list-template-ids: 1716554828 -1601396066 -1173561420 68550683 68550671 68550681 68550683 68550671 68550681 68550683;
        }

        @list l5:level1 {
            mso-level-number-format: arabic-leading-zero;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l5:level2 {
            mso-level-number-format: roman-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l5:level3 {
            mso-level-number-format: roman-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: right;
            text-indent: -9.0pt;
        }

        @list l5:level4 {
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l5:level5 {
            mso-level-number-format: alpha-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l5:level6 {
            mso-level-number-format: roman-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: right;
            text-indent: -9.0pt;
        }

        @list l5:level7 {
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l5:level8 {
            mso-level-number-format: alpha-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
        }

        @list l5:level9 {
            mso-level-number-format: roman-lower;
            mso-level-tab-stop: none;
            mso-level-number-position: right;
            text-indent: -9.0pt;
        }

        @list l6 {
            mso-list-id: 1953434762;
            mso-list-type: hybrid;
            mso-list-template-ids: -2049428390 68550657 68550659 68550661 68550657 68550659 68550661 68550657 68550659 68550661;
        }

        @list l6:level1 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l6:level2 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l6:level3 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l6:level4 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l6:level5 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l6:level6 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        @list l6:level7 {
            mso-level-number-format: bullet;
            mso-level-text: \F0B7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Symbol;
        }

        @list l6:level8 {
            mso-level-number-format: bullet;
            mso-level-text: o;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: "Courier New";
        }

        @list l6:level9 {
            mso-level-number-format: bullet;
            mso-level-text: \F0A7;
            mso-level-tab-stop: none;
            mso-level-number-position: left;
            text-indent: -18.0pt;
            font-family: Wingdings;
        }

        ol {
            margin-bottom: 0cm;
        }

        ul {
            margin-bottom: 0cm;
        }

        -->
	
</style>
	

<style>
    /* Style Definitions */

    table.MsoNormalTable {
        mso-style-name: "Tabela normal";
        mso-tstyle-rowband-size: 0;
        mso-tstyle-colband-size: 0;
        mso-style-noshow: yes;
        mso-style-priority: 99;
        mso-style-parent: "";
        mso-padding-alt: 0cm 5.4pt 0cm 5.4pt;
        mso-para-margin-top: 0cm;
        mso-para-margin-right: 0cm;
        mso-para-margin-bottom: 8.0pt;
        mso-para-margin-left: 0cm;
        line-height: 107%;
        mso-pagination: widow-orphan;
        font-size: 11.0pt;
        font-family: "Calibri","sans-serif";
        mso-ascii-font-family: Calibri;
        mso-ascii-theme-font: minor-latin;
        mso-hansi-font-family: Calibri;
        mso-hansi-theme-font: minor-latin;
        mso-bidi-font-family: "Times New Roman";
        mso-bidi-theme-font: minor-bidi;
        mso-fareast-language: EN-US;
    }
    .auto-style6 {
        color: #800000;
        text-align: center;
        font-size: xx-large;
        font-weight: bold;
    }
</style> 


</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Corpo" runat="Server">
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-md-6">
            <div class="form-row">
                <%--<label for="validationCustomUsername">O que procura ?</label>--%>
                <div class="input-group">
                 <%--   <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">
                            <asp:ImageButton ID="ImageButton1" Visible="true" runat="server" ImageUrl="~/Images/magnifying-glass-97635_640.png" Height="30px" Width="40px" />
                            

                        </span>
                    </div>--%>

<%--                    <asp:TextBox ID="T_Pesquisa" class="form-control" runat="server" placeholder="Digite o que procura e pressione a lupa" aria-describedby="inputGroupPrepend"></asp:TextBox>
                    <div class="invalid-feedback">
                        Por favor, escolha um nome de usuário.
                    </div>--%>

                </div>
            </div>
        </div>

        <%-- <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">
                        <asp:ImageButton ID="Ib_Mapa" runat="server" ImageUrl="~/Images/map-1272165_640.png" Height="30px" Width="40px" />
                    </span>
                </div>
                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Ver Mapa" aria-describedby="inputGroupPrepend">
                <div class="invalid-feedback">
                    Por favor, escolha um nome de usuário.
                </div>

            </div>
        </div>--%>
    </div>

    <p>&nbsp;</p>


    <div class="row" style="text-align: center;">
        <div class="col-md-12">


            <div class="card" style="width: 100%">
                <div class="card-header">
                    <h1 class="auto-style6">NOVA ILUMINAÇÃO PÚBLICA DE VILA VELHA PARCERIA PÚBLICA - PRIVADA</h1>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <asp:Button ID="Btn_Apresentacao" class="panel panel-warning btn-lg btn-block" CausesValidation="False" runat="server" Text="APRESENTAÇÃO" OnClick="Btn_Apresentacao_Click" />

                        <asp:Panel ID="P_Apresentacao" runat="server" Visible="false">
                            <div class="row">

                                <div class="col-12">
                                    <h4 style='margin-top:0cm;line-height:14.4pt;background:white;vertical-align:
	
baseline'>&nbsp;</h4>
	
	
                                    <h4 style="margin-top: 0cm; line-height: 14.4pt; background: white; vertical-align: baseline"><b style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1;text-transform:
	
uppercase">APRESENTAÇÃO<p></p>
                                        </span></b></h4>
	
	
<p style='margin:0cm;margin-bottom:.0001pt;text-align:justify;line-height:18.0pt;
	
background:white;vertical-align:baseline'><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>
	
	
<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
	
normal'><span style='font-size:12.0pt;line-height:107%;font-family:"Arial","sans-serif"'>CONSULTA
	
PÚBLICA – 015/2019.<o:p></o:p></span></b></p>
	
	
<p class=MsoNormal align=center style='text-align:center'><span
	
style='font-size:12.0pt;line-height:107%;font-family:"Arial","sans-serif"'>Processo
	
Administrativo nº 48.903/2019<o:p></o:p></span></p>
	
	
<p style='margin:0cm;margin-bottom:.0001pt;text-align:justify;line-height:18.0pt;
	
background:white;vertical-align:baseline'><span style='font-family:"Arial","sans-serif"'>A
	
<b style='mso-bidi-font-weight:normal'>Prefeitura Municipal de Vila Velha</b>,
	
por meio do <b style='mso-bidi-font-weight:normal'>Conselho Gestor de Parcerias
	
Público Privadas de Vila Velha – CGP-VV</b>, <span style='color:black;
	
mso-themecolor:text1'>comunica a abertura de&nbsp;<strong><span
	
style='font-family:"Arial","sans-serif"'>CONSULTA PÚBLICA</span></strong><b
	
style='mso-bidi-font-weight:normal'>&nbsp;015/2019</b> com o objetivo de obter
	
contribuições e sugestões relativas à minuta de &nbsp;<b style='mso-bidi-font-weight:
	
normal'>EDITAL e</b> <strong><span style='font-family:"Arial","sans-serif"'>CONTRATO
	
DE CONCESSÃO ADMINISTRATIVA PARA PRESTAÇÃO DOS SERVIÇOS DE ILUMINAÇÃO PÚBLICA
	
NO MUNICÍPIO DE VILA VELHA, INCLUÍDOS A IMPLANTAÇÃO, A INSTALAÇÃO, A
	
RECUPERAÇÃO, A MODERNIZAÇÃO, O MELHORAMENTO, A EFICIENTIZAÇÃO, A EXPANSÃO, A
	
OPERAÇÃO E A MANUTENÇÃO DA REDE MUNICIPAL DE ILUMINAÇÃO PÚBLICA</span></strong>,
	
pelo prazo de 20 (vinte) anos, com valor estimado de&nbsp;<strong><span
	
style='font-family:"Arial","sans-serif"'>R$ 335.058.508,18 (trezentos e trinta
	
e cinco milhões, cinquenta e oito mil, quinhentos e oito reais e dezoito
	
centavos) </span></strong><strong><span style='font-family:"Arial","sans-serif";
	
font-weight:normal;mso-bidi-font-weight:bold'>contemplando</span></strong><strong><span
	
style='font-family:"Arial","sans-serif"'> </span></strong><strong><span
	
style='font-family:"Arial","sans-serif";font-weight:normal;mso-bidi-font-weight:
	
bold'>os valores de investimentos, custos e despesas de operação e manutenção
	
do parque de iluminação pública.</span></strong><o:p></o:p></span></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;
	
margin-bottom:.0001pt;text-align:justify;line-height:18.0pt;background:white;
	
vertical-align:baseline'><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Qualquer cidadão ou organização pode enviar
	
comentários, críticas e sugestões sobre os documentos disponibilizados para que
	
sejam avaliados antes do início do processo licitatório. <o:p></o:p></span></p>
	
	
<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	
justify;line-height:18.0pt;background:white;vertical-align:baseline'><span
	
style='font-size:12.0pt;font-family:"Arial","sans-serif";color:black;
	
mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>
	
	
<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
	
margin-left:18.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;
	
line-height:18.0pt;mso-list:l1 level1 lfo1;tab-stops:list 36.0pt;background:
	
white;vertical-align:baseline'><![if !supportLists]><span style='font-size:
	
10.0pt;mso-bidi-font-size:12.0pt;font-family:Symbol;mso-fareast-font-family:
	
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
	
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-size:12.0pt;font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Objetivo do Projeto de Parceria
	
Público-Privada:<o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;
	
margin-bottom:.0001pt;text-align:justify;line-height:18.0pt;background:white;
	
vertical-align:baseline'><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>A referida contratação objetiva a melhoria e
	
uniformidade da qualidade dos SERVIÇOS DE ILUMINAÇÃO PÚBLICA no MUNICÍPIO DE
	
VILA VELHA – ES, incluindo, dentre outras medidas: <o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Modernização de todo o parque de iluminação
	
pública no prazo de 15 (quinze) meses, substituindo as atuais luminárias por
	
outras com tecnologia LED;<o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Atendimento às normas da ABNT de iluminação pública
	
para as vias e calçadas;<o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Redução dos pontos escuros em todo o
	
município;<o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Elevação significativa da qualidade da
	
iluminação pública, incluindo, índice de reprodução de cores, uniformidade e
	
iluminância, contribuindo para a melhoria da <b style='mso-bidi-font-weight:
	
normal'>segurança pública</b> em Vila Velha;<o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Atendimento 24h à população por telefone e
	
pela internet;<o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Melhoria na qualidade dos serviços de
	
operação e manutenção do parque prestados à população, reduzindo o tempo
	
necessário para correção de defeitos e anomalias no sistema de iluminação
	
pública; <o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Implementação e utilização de tecnologias
	
inteligentes de operação e monitoramento remoto, com utilização de telegestão,
	
na iluminação pública de praças, parques urbanos e vias de maior fluxo de
	
veículos;<o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Expansão da rede com a finalidade de suprir a
	
demanda reprimida e o crescimento vegetativo do Município; <o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Valorização do patrimônio histórico através
	
da iluminação artística e de destaque; e <o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;
	
margin-bottom:.0001pt;text-align:justify;text-indent:-18.0pt;line-height:18.0pt;
	
mso-list:l0 level1 lfo5;background:white;vertical-align:baseline'><![if !supportLists]><span
	
style='font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
	
Symbol;color:black;mso-themecolor:text1'><span style='mso-list:Ignore'>·<span
	
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>Melhoria dos índices de eficiência energética
	
do sistema de iluminação pública.<o:p></o:p></span></p>
	
	
<p style='margin-top:9.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;
	
margin-bottom:.0001pt;text-align:justify;line-height:18.0pt;background:white;
	
vertical-align:baseline'><span style='font-family:"Arial","sans-serif";
	
color:black;mso-themecolor:text1'>A contratação em questão visa viabilizar
	
investimentos que garantam a modernização e eficientização do parque de
	
iluminação pública do município, acompanhados de um padrão de performance
	
operacional que propicie o atendimento às expectativas e demandas da população
	
e a valorização do patrimônio da cidade.<o:p></o:p></span></p>
	
	
<p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
	
"Arial","sans-serif";color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>
	
	

	
	

	
	


                               <%-- <div class="col-12">

                                    <h6>APRESENTAÇÃO</h6>
                                    <h6>CONSULTA PÚBLICA – 015/2019</h6>
                                    
                                        <h8>
                                            Processo Administrativo nº 48.903/2019</h8>
                                      
                                    <div class="text-justify">
                                      <h8>
                                            <br />
                                            A Prefeitura Municipal de Vila Velha, por meio do Conselho Gestor de Parcerias Público Privadas de Vila Velha – CGP-VV, comunica a abertura de&nbsp;CONSULTA PÚBLICA&nbsp;015/2019 com o objetivo de obter contribuições e sugestões relativas à minuta de &nbsp;EDITAL e CONTRATO DE CONCESSÃO ADMINISTRATIVA PARA PRESTAÇÃO DOS SERVIÇOS DE ILUMINAÇÃO PÚBLICA NO MUNICÍPIO DE VILA VELHA, INCLUÍDOS A IMPLANTAÇÃO, A INSTALAÇÃO, A RECUPERAÇÃO, A MODERNIZAÇÃO, O MELHORAMENTO, A EFICIENTIZAÇÃO, A EXPANSÃO, A OPERAÇÃO E A MANUTENÇÃO DA REDE MUNICIPAL DE ILUMINAÇÃO PÚBLICA, pelo prazo de 20 (vinte) anos, com valor estimado de&nbsp;R$ 335.058.508,18 (trezentos e trinta e cinco milhões, cinquenta e oito mil, quinhentos e oito reais e dezoito centavos) contemplando os valores de investimentos, custos e despesas de operação e manutenção do parque de iluminação pública.
                                            
                                            Qualquer cidadão ou organização pode enviar comentários, críticas e sugestões sobre os documentos disponibilizados para que sejam avaliados antes do início do processo licitatório. Objetivo do Projeto de Parceria Público-Privada: A referida contratação objetiva a melhoria e uniformidade da qualidade dos SERVIÇOS DE ILUMINAÇÃO PÚBLICA no MUNICÍPIO DE VILA VELHA – ES, incluindo, dentre outras medidas:<br />
                                          
                                          <ul style="list-style-type:square;">
                                          <li> Modernização de todo o parque de iluminação pública no prazo de 15 (quinze) meses, substituindo as atuais luminárias por outras com tecnologia LED;
                                           <li>Atendimento às normas da ABNT de iluminação pública para as vias e calçadas;
                                          <li> Redução dos pontos escuros em todo o município;
                                           <li>Elevação significativa da qualidade da iluminação pública, incluindo, índice de reprodução de cores, uniformidade e iluminância, contribuindo para a melhoria da segurança pública em Vila Velha;
                                           <li>Atendimento 24h à população por telefone e pela internet;
                                           <li>Melhoria na qualidade dos serviços de operação e manutenção do parque prestados à população, reduzindo o tempo necessário para correção de defeitos e anomalias no sistema de iluminação pública; Implementação e utilização de tecnologias inteligentes de operação e monitoramento remoto, com utilização de telegestão, na iluminação pública de praças, parques urbanos e vias de maior fluxo de veículos;
                                           <li>Expansão da rede com a finalidade de suprir a demanda reprimida e o crescimento vegetativo do Município; Valorização do patrimônio histórico através da iluminação artística e de destaque; 
                                           <li>Melhoria dos índices de eficiência energética do sistema de iluminação pública. A contratação em questão visa viabilizar investimentos que garantam a modernização e eficientização do parque de iluminação pública do município, acompanhados de um padrão de performance operacional que propicie o atendimento às expectativas e demandas da população e a valorização do patrimônio da cidade.
                                              </ul>
                                      </h8>
                                    </div>
                                


                                </div>--%>
                            </div>
                        </asp:Panel>
                    </li>
                    <li class="list-group-item">
                        <asp:Button ID="Btn_Prazo" class="panel panel-warning btn-lg btn-block" CausesValidation="False" runat="server" Text="PRAZOS" OnClick="Btn_Prazo_Click" />
                        <asp:Panel ID="P_Prazo" runat="server" Visible="false" BackColor="White">
                            <p class=MsoNormal style="text-align: center">&nbsp;</p>
	
	
                            <p class="MsoNormal" style="text-align: center">
                                <span style="font-size:12.0pt;line-height:107%;font-family:
	
&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1"><strong><em>PRAZO </em></strong>
                                <p></p>
                                </span>
                            </p>
	
	
<p class=MsoNormal style='text-align:justify'><span style='font-size:12.0pt;
	
line-height:107%;font-family:"Arial","sans-serif";color:black;mso-themecolor:
	
text1'>Os estudos e as minutas de Edital e Contrato, com os seus respectivos
	
anexos, estarão disponíveis para consulta neste site, pelo prazo de 40
	
(quarenta) dias, a partir de <b style='mso-bidi-font-weight:normal'>01 de
	
outubro de 2019</b>, até <b style='mso-bidi-font-weight:normal'>09 de novembro
	
de 2019</b>, podendo haver prorrogação mediante aviso.<o:p></o:p></span></p>
	
	
<p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
	
"Arial","sans-serif";color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>
                        </asp:Panel>
                    </li>
                    <li class="list-group-item">
                        <asp:Button ID="Btn_Documentos" class="panel panel-warning btn-lg btn-block" CausesValidation="False" runat="server" Text="DOCUMENTOS" OnClick="Btn_Documentos_Click" />

                        <asp:Panel ID="P_Documentos" runat="server" Visible="false" BackColor="White">
                            
                            <p>&nbsp;</p>

	
<p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
	
"Arial","sans-serif";color:black;mso-themecolor:text1'><strong><em>DOCUMENTOS</em></strong> <o:p></o:p></span></p>
	
	
<p class=MsoListParagraphCxSpFirst style='text-indent:-18.0pt;mso-list:l2 level1 lfo7; text-align: left;'><![if !supportLists]><span
	
style='font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
	
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
	
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:107%;
	
font-family:"Arial","sans-serif";color:black;mso-themecolor:text1'>Aviso da
	
Consulta Pública (em breve)<o:p></o:p></span></p>
	
	
<p class=MsoListParagraphCxSpLast style='text-indent:-18.0pt;mso-list:l2 level1 lfo7; text-align: left;'><![if !supportLists]><span
	
style='font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
	
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
	
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:107%;
	
font-family:"Arial","sans-serif";color:black;mso-themecolor:text1'>Regulamento
	
da Consulta Pública (em breve)<o:p></o:p></span></p>
	
	
<p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
	
"Arial","sans-serif";color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>
	
	
<p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
	
"Arial","sans-serif";color:black;mso-themecolor:text1'><strong><em>EDITAL E CONTRATO</em></strong><o:p></o:p></span></p>
	
	
<p class=MsoListParagraphCxSpFirst style='text-indent:-18.0pt;mso-list:l3 level1 lfo2; text-align: left;'>
    <asp:Image ID="Image1" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp; <a href="Documentos/Edital%20e%20Contrato/01_IP_Vila_Velha-Minuta_de_Edital.pdf"><![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">01.<span style="font:7.0pt &quot;Times New Roman&quot;"> </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
color:black;mso-themecolor:text1">IP Vila Velha - Minuta de Edital com anexos</span></a><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
color:black;mso-themecolor:text1"> </span></p>
	
	
<p class=MsoListParagraphCxSpMiddle style="text-align: left"><span style='font-size:12.0pt;line-height:
	
107%;font-family:"Arial","sans-serif";color:black;mso-themecolor:text1'><o:p>&nbsp;</o:p></span></p>
	
	
<p class=MsoListParagraphCxSpMiddle style='text-indent:-18.0pt;mso-list:l3 level1 lfo2; text-align: left;'><asp:Image ID="Image2" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Edital%20e%20Contrato/02.0_IP_Vila_Velha-Minuta%20de%20Contrato.pdf"><![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">02.<span style="font:7.0pt &quot;Times New Roman&quot;"> </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
color:black;mso-themecolor:text1">IP Vila Velha - Minuta de Contrato </span></a></p>
	
	
<p class=MsoListParagraphCxSpMiddle style='margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;'><![if !supportLists]><span
	
style='font-size:12.0pt;line-height:107%;font-family:"Arial","sans-serif";
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1'><span
	
style='mso-list:Ignore'>i.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:107%;
	
font-family:"Arial","sans-serif";color:black;mso-themecolor:text1'>IP Vila Velha - Anexo 01 - Modelo de solicitação de esclarecimentos *</p>
	
	
<p class=MsoListParagraphCxSpMiddle style='margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;'><![if !supportLists]><span
	
style='font-size:12.0pt;line-height:107%;font-family:"Arial","sans-serif";
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1'><span
	
style='mso-list:Ignore'>ii.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:107%;
	
font-family:"Arial","sans-serif";color:black;mso-themecolor:text1'>IP Vila
	
Velha - Anexo 02 - Atos constitutivos da concessionária *<o:p></o:p></span></p>
	
	
<p class=MsoListParagraphCxSpMiddle style='margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;'><![if !supportLists]><span
	
style='font-size:12.0pt;line-height:107%;font-family:"Arial","sans-serif";
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1'><span
	
style='mso-list:Ignore'>iii.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:107%;
	
font-family:"Arial","sans-serif";color:black;mso-themecolor:text1'>IP Vila
	
Velha - Anexo 03 - Proposta comercial da concessionária *<o:p></o:p></span></p>
	
	
<p class=MsoListParagraphCxSpMiddle style='margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;'><asp:Image ID="Image3" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Edital%20e%20Contrato/02.4_IP_Vila_Velha-Anexo_04-Cadastro_da_Rede_Municipal.pdf"><![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">iv.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">IP Vila Velha - Anexo 04 - Cadastro da Rede Municipal</span></a><p></p>
                            <p>
    </p>
    <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
      <asp:Image ID="Image4" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;  <a href="Documentos/Edital%20e%20Contrato/02.5_IP_Vila_Velha-Anexo_05-Especificações_Mínimas_dos_Serviços.pdf"><![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">v.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">IP Vila Velha - Anexo 05 - Especificações Mínimas dos Serviços</span></a><p>
        </p>
        <p>
        </p>
        <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
         <asp:Image ID="Image5" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;   <a href="Documentos/Edital%20e%20Contrato/02.6_IP_Vila_Velha-Anexo_06-Diretrizes_Iluminação_de_Destaque.pdf"><![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">vi.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">IP Vila Velha - Anexo 06 - Diretrizes Iluminação de Destaque</span></a><p>
            </p>
            <p>
            </p>
            <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
             <asp:Image ID="Image6" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;   <a href="Documentos/Edital%20e%20Contrato/02.7_IP_Vila_Velha-Anexo_07-Diretrizes_Ambientais.pdf"><![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">vii.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
color:black;mso-themecolor:text1">IP Vila Velha - Anexo 07 - Diretrizes Ambientais</span></a><p>
                </p>
                <p>
                </p>
                <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
             <asp:Image ID="Image7" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;       <a href="Documentos/Edital%20e%20Contrato/02.8_IP_Vila_Velha-Anexo_08-Sistema_de_Mensuração_do_Desempenho.pdf"><![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">viii.</span></span><![endif]><span style="font-size:
	
12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;
	
mso-themecolor:text1">IP Vila Velha - Anexo 08 - Sistema de Mensuração do Desempenho</span></a><p>
                    </p>
                    <p>
                    </p>
                    <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
            <asp:Image ID="Image8" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;            <a href="Documentos/Edital%20e%20Contrato/02.9_IP_Vila_Velha-Anexo_09-Modelo_para_o_calculo_do_pagamento_da_concessionaria.pdf"><![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">ix.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">IP Vila Velha - Anexo 09 - Modelo para o cálculo do pagamento da concessionária</span></a><p>
                        </p>
                        <p>
                        </p>
                        <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
                            <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">x.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">IP Vila Velha - Anexo 10 - Condições gerais das apólices de seguros *<p></p>
                            </span>
                            <p>
                            </p>
                            <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
                                <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">xi.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">IP Vila Velha - Anexo 11 - Condições gerais de garantia de execução do contrato *<p>
                                </p>
                                </span>
                                <p>
                                </p>
                                <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
                                    <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">xii.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
color:black;mso-themecolor:text1">IP Vila Velha - Anexo 12 - Condições gerais do contrato com a instituição financeira depositária *<p>
                                    </p>
                                    </span>
                                    <p>
                                    </p>
                                    <p class="MsoListParagraphCxSpMiddle" style="margin-left:72.0pt;mso-add-space:
	
auto;text-indent:-18.0pt;mso-list:l5 level2 lfo6; text-align: left;">
                                        <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore"><asp:Image ID="Image9" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp; xiii.</span></span><![endif]><span style="font-size:
	
12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;
	
mso-themecolor:text1"> <a href="Documentos/Edital%20e%20Contrato/02.13_IP_Vila_Velha-Anexo_13-Classifição_de_vias.pdf">IP Vila Velha - Anexo 13 - Classificação de vias</a><p>
                                        </p>
                                        </span>
                                        <p>
                                        </p>
                                        <p class="MsoListParagraphCxSpMiddle" style="margin-left:108.0pt;mso-add-space:
	
auto;text-indent:-108.0pt;mso-text-indent-alt:-9.0pt;mso-list:l5 level3 lfo6; text-align: left;">
                                            <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore"><span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><asp:Image ID="Image10" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;i.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp; </span></span></span><![endif]>  <a href="Documentos/Edital%20e%20Contrato/02.13_IP_Vila_Velha-Anexo_13-Relação_de_vias.pdf"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
color:black;mso-themecolor:text1">IP Vila Velha - Anexo 13 – Relação de vias<p>
                                            </p>
                                            </span></a>
                                            <p>
                                            </p>
                                            </a>
                                            <p class="MsoListParagraphCxSpMiddle" style="margin-left:108.0pt;mso-add-space:
	
auto;text-indent:-108.0pt;mso-text-indent-alt:-9.0pt;mso-list:l5 level3 lfo6; text-align: left;">
                                                <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore"><span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><asp:Image ID="Image11" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;ii.<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><a href="Documentos/Edital%20e%20Contrato/02.13_IP_Vila_Velha-Anexo_13-Mapa_de_vias_V1aV3.pdf"><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
color:black;mso-themecolor:text1">IP Vila Velha - Anexo 13 – Mapa de vias<p>
                                                </p>
                                                </span></a>
                                                <p>
                                                </p>
                                                </a>
                                                <div style="mso-element:para-border-div;border:none;border-bottom:solid windowtext 1.0pt;
	
mso-border-bottom-alt:solid windowtext .75pt;padding:0cm 0cm 1.0pt 0cm;
	
margin-left:54.0pt;margin-right:0cm">
                                                    <p class="MsoListParagraphCxSpLast" style="border-style: none; border-color: inherit; border-width: medium; margin-left:18.0pt; mso-add-space:auto;
	
 text-indent:-18.0pt; mso-list:l5 level2 lfo6; mso-border-bottom-alt:
	
solid windowtext .75pt; padding:0cm; mso-padding-alt:0cm 0cm 1.0pt 0cm; text-align: left;">
                                                        <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Arial;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">xiv.</span></span><![endif]><span style="font-size:
	
12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;
	
mso-themecolor:text1">IP Vila Velha - Anexo 14 - Diretrizes de contratação do verificador independente *</span></p>
                                                </div>
                                                <p class="MsoNormal" style="margin-left:54.0pt">
                                                    <span style="font-size:12.0pt;
	
line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:
	
text1">* Os anexos da minuta de contrato marcadas com asterisco encontram-se no arquivo 02. IP Vila Velha – Minuta de Contrato<p>
                                                    </p>
                                                    </span>
                                                    <p>
                                                    </p>
                                                    <p class="MsoNormal">
                                                        <span style="font-size:12.0pt;line-height:107%;font-family:
	
&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">
                                                        <p>
                                                            &nbsp;</p>
                                                        </span>
                                                        <p>
                                                        </p>
                                                        <p class="MsoNormal">
                                                            <span style="font-size:12.0pt;line-height:107%;font-family:
	
&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1"><strong>ESTUDOS</strong><p>
                                                            </p>
                                                            </span>
                                                            <p>
                                                            </p>
                                                            <div class="container-fluid" style="margin-left:25px">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <ul style="list-style-type:disc; text-align:left; font-family:Arial; font-size:13pt">
                                                                           <a href="Documentos/Estudos/IP_Vila_Velha-Relatório_de_Iluminacao_de_Destaque.pdf"> <li><asp:Image ID="Image19" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;IP Vila Velha - Relatório de Iluminação de Destaque</a></li><li><asp:Image ID="Image12" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Estudos/IP_Vila_Velha-Plano_de_Investimentos_e_operações.pdf">IP Vila Velha - Plano de Investimentos e operações</a></li>
                                                                            <li><asp:Image ID="Image13" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Estudos/IP_Vila_Velha-Plano_de_Negócios_referencial.pdf">IP Vila Velha - Plano de Negócios referencial</a></li>
                                                                            <li><asp:Image ID="Image14" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Estudos/IP_Vila_Velha-Relatório_de_Diretrizes_Ambientais.pdf">IP Vila Velha - Relatório Ambiental</a></li>
                                                                            <li><asp:Image ID="Image15" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Estudos/IP_Vila_Velha-Avaliação_Econômico-financeira.pdf">IP Vila Velha - Avaliação Econômico-financeira</a></li>
                                                                            <li><asp:Image ID="Image16" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Estudos/IP_Vila_Velha-Relatório_de_Engenharia.pdf">IP Vila Velha - Relatório de Engenharia</a></li>
                                                                            <li><asp:Image ID="Image17" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Estudos/IP_Vila_Velha-Relatório_de_Diagnóstico_Técnico.pdf">IP Vila Velha - Relatório de Diagnóstico Técnico</a></li>
                                                                            <li><asp:Image ID="Image18" runat="server" Height="20px" ImageUrl="~/Images/magnifying-glass-97635_640.png" Width="20px" /> &nbsp;&nbsp;<a href="Documentos/Estudos/IP_Vila_Velha-DF_CAPEX_OPEX.xlsx">IP Vila Velha – Demonstrativos Financeiros, OPEX e CAPEX</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <%--<p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
	
"Arial","sans-serif";color:black;mso-themecolor:text1'><strong>APRESENTAÇÕES (em breve)</strong><o:p></o:p></span></p>
	
	
<p class=MsoListParagraph style='text-indent:-18.0pt;mso-list:l4 level1 lfo4; text-align: left;'><![if !supportLists]><span
	
style='font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
	
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1'><span
	
style='mso-list:Ignore'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</span></span></span><![endif]><span style='font-size:12.0pt;line-height:107%;
	
font-family:"Arial","sans-serif";color:black;mso-themecolor:text1'>Apresentação
	
do projeto (em breve)<o:p></o:p></span></p>--%>
                                                            <p class="MsoNormal">
                                                                <span style="font-size:12.0pt;line-height:107%;font-family:
	
&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">
                                                                <p>
                                                                    &nbsp;</p>
                                                                </span>
                                                                <p>
                                                                </p>
                                                                <p class="MsoNormal">
                                                                    <span style="font-size:12.0pt;line-height:107%;font-family:
	
&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1"><strong>AUDIÊNCIA PÚBLICA (em breve)</strong><p>
                                                                    </p>
                                                                    </span>
                                                                    <p>
                                                                    </p>
                                                                    <p class="MsoListParagraphCxSpFirst" style="text-indent:-18.0pt;mso-list:l4 level1 lfo4; text-align: left;">
                                                                        <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
	
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">·<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">Aviso de Audiência Pública (em breve)<p>
                                                                        </p>
                                                                        </span>
                                                                        <p>
                                                                        </p>
                                                                        <p class="MsoListParagraphCxSpMiddle" style="text-indent:-18.0pt;mso-list:l4 level1 lfo4; text-align: left;">
                                                                            <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
	
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">·<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">Regulamento da Audiência Pública (em breve)<p>
                                                                            </p>
                                                                            </span>
                                                                            <p>
                                                                            </p>
                                                                            <p class="MsoListParagraphCxSpLast" style="text-indent:-18.0pt;mso-list:l4 level1 lfo4; text-align: left;">
                                                                                <![if !supportLists]><span style="font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:
	
Symbol;mso-bidi-font-family:Symbol;color:black;mso-themecolor:text1"><span style="mso-list:Ignore">·<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span style="font-size:12.0pt;line-height:107%;
	
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:black;mso-themecolor:text1">Ata da Audiência Pública (em breve)<p>
                                                                                </p>
                                                                                </span>
                                                                                <p>
                                                                                </p>
                                                                                <span style="font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
	
mso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-ansi-language:
	
PT-BR;mso-fareast-language:EN-US;mso-bidi-language:AR-SA">
                                                                                <br clear="all" style="mso-special-character:line-break;page-break-before:always">
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br></br>
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <br></br>
                                                                                <br>
                                                                                <br>
                                                                                <br></br>
                                                                                <br>
                                                                                <br>
                                                                                <br></br>
                                                                                <br>
                                                                                <br></br>
                                                                                <br>
                                                                                <br></br>
                                                                                <br>
                                                                                <br></br>
                                                                                <br>
                                                                                <br></br>
                                                                                <br></br>
                                                                                <br></br>
                                                                                <br></br>
                                                                                <br></br>
                                                                                <br></br>
                                                                                <br></br>
                                                                                <br></br>
                                                                                <br></br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </br>
                                                                                </span>
                                                                                <div class="WordSection1">
                                                                                </div>
                                                                                </div>
                                                                                <p>
                                                                                </p>
                                                                                <asp:DataList ID="Dl_Documentos" runat="server" DataKeyField="Id" DataSourceID="SqlDocumentos">
                                                                                    <ItemTemplate>
                                                                                        <asp:Label ID="IdLabel" runat="server" Text='<%# Eval("Id") %>' Visible="false" />
                                                                                        <asp:HyperLink ID="HyperLink4" runat="server" NavigateUrl='<%# "~/Documentos/" + Eval("Nome") %>' Text='<%# Eval("Nome") %>'>  </asp:HyperLink>
                                                                                        </p>
                                                                                        <asp:Label ID="LocalLabel" runat="server" Text='<%# Eval("Local") %>' Visible="false" />
                                                                                    </ItemTemplate>
                                                                                </asp:DataList>
                                                                                <asp:SqlDataSource ID="SqlDocumentos" runat="server" ConnectionString="<%$ ConnectionStrings:ConexaoBanco %>" SelectCommand="SELECT [Id], [Nome], [Local] FROM [Documentos]"></asp:SqlDataSource>
                                                                                </span>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                                <p>
                                                                                </p>
                                                                            </p>
                                                                        </p>
                                                                    </p>
                                                                </p>
                                                            </p>
                                                        </p>
                                                    </p>
                                                </p>
                                            </p>
                                        </p>
                                    </p>
                                </p>
                            </p>
                        </p>
                    </p>
                </p>
            </p>
        </p>
    </p>
                            </p>
	
	
                        </asp:Panel>
                    </li>
                    <li class="list-group-item">
                        <asp:Button ID="Btn_Contribicoes" class="panel panel-warning btn-lg btn-block" runat="server" Text="CONTRIBUIÇÕES" OnClick="Btn_Contribicoes_Click" />
                        <asp:Panel ID="P_Contribuicoes" runat="server" Visible="false" BackColor="White" HorizontalAlign="Left">
                            
                            <p></p>
                            <p class=MsoNormal style="text-align: center"><span style='font-size:12.0pt;line-height:107%;font-family:
	
"Arial","sans-serif";color:black;mso-themecolor:text1'><strong><em>CONTRIBUIÇÕES</em></strong><o:p></o:p></span></p>
	
	
<p class=MsoNormal style='text-align:justify'><span style='font-size:12.0pt;
	
line-height:107%;font-family:"Arial","sans-serif";color:black;mso-themecolor:
	
text1'>Eventuais contribuições e questionamentos deverão ser feitos por meio do
	
formulário disponibilizado abaixo até a data do término da consulta pública.<o:p></o:p></span></p>
	
	
<p class=MsoNormal style='text-align:justify'><span style='font-size:12.0pt;
	
line-height:107%;font-family:"Arial","sans-serif";color:black;mso-themecolor:
	
text1'>O cidadão que preferir poderá fazer uso do terminal disponível na sede
	
da administrativa da Prefeitura Municipal situada na Avenida Santa Leopoldina,
	
nº 840, térreo, Coqueiral de Itaparica, Vila Velha/ES.<o:p></o:p></span></p>
	
	
<p class=MsoNormal style='text-align:justify'><span style='font-size:12.0pt;
	
line-height:107%;font-family:"Arial","sans-serif";color:black;mso-themecolor:
	
text1'>Após registradas e consolidadas em relatório, as manifestações às
	
contribuições serão disponibilizadas na Internet, no endereço eletrônico desta
	
consulta. É importantíssima a participação da comunidade nesta fase preliminar.
	
Contamos com a colaboração de todos para tornar o projeto cada vez mais
	
competitivo e transparente.<br clear=all style='mso-special-character:line-break;
	
page-break-before:always'>
	
<o:p></o:p></span></p>



                            <div class="container-fluid">
                                <div class="card-deck mb-4">
                                    <div class="card mb-12 shadow-sm">
                                        <div class="card-header" style="text-align:justify">
                                            <h6>CONSULTA PÚBLICA  CONCESSÃO DOS SERVIÇOS DE ILUMINAÇÃO PÚBLICA NO MUNÍSIPIO DE VILA VELHA/ ESPÍRITO SANTO, INCLUÍDOS A IMPLANTAÇÃO, A INSTALAÇÃO, A RECUPERAÇÃO, A MODERNIZAÇÃO, O MELHORAMENTO, A EFICIENTIZAÇÃO, A EXPANSÃO, A OPERAÇÃO E A MANUTENÇÃO DA REDE MUNICIPAL DE ILUNIAÇÃO PÚBLICA</h6>
                                        </div>
                                        <div class="card-header" style="text-align:center">
                                            <h6>MODELO PARA CONTRIUIÇÕES À CONSULTA PÚBLICA</h6>
                                        </div>
                                        <div class="card-body">


                                            <div class="form-group">

                                                <div class="form-group">
                                                    <span class="auto-style4">
                                                    <label for="id_documentos">
                                                    Selecione o DOCUMENTO que deseja fazer suas contribuições</label></span>
                                                    <asp:DropDownList ID="Ddl_contribuicoes" CssClass="form-control" runat="server" OnDataBound="Ddl_contribuicoes_DataBound1" >
                                                       <asp:ListItem>--- Escolha um(1) documento---</asp:ListItem>
                                                        <asp:ListItem>Edital - Anexo 1 - modelo de solicitação de esclarecimento</asp:ListItem>
 <asp:ListItem>Edital - Anexo 2 - termos e condições mínimas do seguro-garantia</asp:ListItem>
 <asp:ListItem>Edital - Anexo 3 - modelo de fiança bancária</asp:ListItem>
 <asp:ListItem>Edital - Anexo 4 – modelo de carta de apresentação da proposta comercial</asp:ListItem>
 <asp:ListItem>Edital - Anexo 5 - modelo de carta de apresentação dos documentos de habilitação</asp:ListItem>
 <asp:ListItem>Edital - Anexo 6 - Declaração de proposta</asp:ListItem>
 <asp:ListItem>Edital - Anexo 7 - modelo de procuração </asp:ListItem>
 <asp:ListItem>Edital - Anexo 8 - declaração de análise e viabilidade da proposta comercial escrita emitida pela instituição ou entidade financeira</asp:ListItem>
 <asp:ListItem>Edital - Anexo 9 - termo de confidencialidade entre a licitante e a instituição ou entidade financeira</asp:ListItem>
 <asp:ListItem>Edital - Anexo 11 – modelo de ratificação de lance</asp:ListItem>
 <asp:ListItem>Edital - Anexo 12 - declaração de ratificação da declaração de análise e viabilidade da proposta comercial emitida pela instituição financeira</asp:ListItem>
 <asp:ListItem>Edital - Anexo 13 - declaração formal acerca do atendimento às prerrogativas referentes aos critérios de desempate estabelecidos no art. 3º, §2º da lei de licitações</asp:ListItem>
 <asp:ListItem>Minuta de Contrato</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 01 - Modelo de solicitação de esclarecimentos</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 02 - Atos constitutivos da concessionária</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 03 - Proposta comercial da concessionária</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 04 - Cadastro da Rede Municipal</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 05 - Especificações Mínimas dos Serviços</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 06 - Diretrizes Iluminação de Destaque</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 07 - Diretrizes Ambientais</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 08 - Sistema de Mensuração do Desempenho</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 09 - Modelo para o cálculo do pagamento da concessionária</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 10 - Condições gerais das apólices de seguros </asp:ListItem>
 <asp:ListItem>Contrato - Anexo 11 - Condições gerais de garantia de execução do contrato </asp:ListItem>
 <asp:ListItem>Contrato - Anexo 12 - Condições gerais do contrato com a instituição financeira depositária</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 13 - Classificação de vias</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 13 – Relação de vias</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 13 – Mapa de vias</asp:ListItem>
 <asp:ListItem>Contrato - Anexo 14 - Diretrizes de contratação do verificador independente</asp:ListItem>
 <asp:ListItem>Estudos - Relatório de Iluminação de Destaque</asp:ListItem>
 <asp:ListItem>Estudos - Plano de Investimentos e operações</asp:ListItem>
 <asp:ListItem>Estudos - Plano de Negócios referencial</asp:ListItem>
 <asp:ListItem>Estudos - Relatório Ambiental </asp:ListItem>
 <asp:ListItem>Estudos - Avaliação Econômico-financeira</asp:ListItem>
 <asp:ListItem>Estudos - Relatório de Engenharia</asp:ListItem>
 <asp:ListItem>Estudos - Relatório de Diagnóstico Técnico</asp:ListItem>
 <asp:ListItem>Estudos – Demonstrativos Financeiros, OPEX e CAPEX</asp:ListItem>

                                                    </asp:DropDownList>

                                                    <%--<asp:SqlDataSource ID="Sql_Documentos_Contribuicoes" runat="server" ConnectionString="<%$ ConnectionStrings:ConexaoBanco %>" SelectCommand="SELECT [Id], [Nome], [Local] FROM [Documentos]"></asp:SqlDataSource>--%>
                                                    <p></p>
                                                <label for="solicitante">Nome:</label>
                                                <asp:TextBox ID="T_solicitante" class="form-control" runat="server"></asp:TextBox>
                                                    <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" ErrorMessage="Preenchimento Obrigatório" ControlToValidate="T_solicitante" ForeColor="#FF3300"></asp:RequiredFieldValidator>
                                                </div>
                                            <div class="form-group">
                                                <label for="empresa_entidade">Empresa/Entidade:</label>
                                                <asp:TextBox ID="T_empresa_entidade" class="form-control" runat="server"></asp:TextBox>
                                                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" ErrorMessage="Preenchimento Obrigatório" ControlToValidate="T_empresa_entidade" ForeColor="#FF3300"></asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label for="cnpf_cpf">CNPJ/CPF:</label>
                                                <asp:TextBox ID="T_cnpf_cpf" class="form-control" runat="server"></asp:TextBox>
                                                <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" ErrorMessage="Preenchimento Obrigatório" ControlToValidate="T_cnpf_cpf" ForeColor="#FF3300"></asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label for="endereco">Endereço:</label>
                                                <asp:TextBox ID="T_endereco" class="form-control" runat="server"></asp:TextBox>
                                                <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" ErrorMessage="Preenchimento Obrigatório" ControlToValidate="T_endereco" ForeColor="#FF3300"></asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label for="meios_contato">Meios de Contato (telefone/e-mail):</label>
                                                <asp:TextBox ID="T_meios_contato" class="form-control" runat="server"></asp:TextBox>
                                                <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" ErrorMessage="Preenchimento Obrigatório" ControlToValidate="T_meios_contato" ForeColor="#FF3300"></asp:RequiredFieldValidator>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="oque">
                                                    Dispositivo, capítulo, cláusula ou item<br />
                                                    (transcrever o dispositivo ao qual o pedido de esclarecimento se refere, ou
                                                    <br />
                                                    determinação assunto tratado em seu conteúdo):</label>
                                                <asp:TextBox ID="T_oque" class="form-control" runat="server" Height="175px" TextMode="MultiLine"></asp:TextBox>
                                                <asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" ErrorMessage="Preenchimento Obrigatório" ControlToValidate="T_oque" ForeColor="#FF3300"></asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label for="contribuicao">Contribuição (sugestão, opinição, crítica, etc.):</label>
                                                <asp:TextBox ID="T_contribuicao" class="form-control" runat="server" Height="175px" TextMode="MultiLine"></asp:TextBox></div>
                                                <asp:RequiredFieldValidator ID="RequiredFieldValidator7" runat="server" ErrorMessage="Preenchimento Obrigatório" ControlToValidate="T_contribuicao" ForeColor="#FF3300"></asp:RequiredFieldValidator>

                                                <p></p>
                                            <asp:Button ID="Btn_Cadastrar" runat="server" Text="Cadastrar" OnClick="Btn_Cadastrar_Click" />
                                      

                                            <asp:Button ID="Btn_Voltar" runat="server" CausesValidation="False" Text="Voltar" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </asp:Panel>
                    </li>
                </ul>
            </div>

            <p></p>
        </div>
        <div class="col-md-12">
            <div class="row">
            </div>
        </div>
    </div>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="Rodape" runat="Server">
</asp:Content>

