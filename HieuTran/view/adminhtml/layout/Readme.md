<!-- - The Layout is the major path of view layer
- The layout file is a XML file which will define the page structure and will be locate in {module_root}/view/{area}/layout/ folder
- The Area path can be frontend or adminhtml which define where the layout will be applied.
Eg: /var/www/html/magento2/app/code/Tutorial/HieuTran/view/adminhtml/layout/hieutran_news_index.xml

- There is a special layout file name default.xml which will be applied for all the page in it’s area. Otherwhile, the layout file will have name as format: {router_id}_{controller_name}_{action_name}.xml.

- When rendering page, Magento will check the layout file to find the handle for the page and then load Block and Template. We will create a layout handle file for this module: -->

