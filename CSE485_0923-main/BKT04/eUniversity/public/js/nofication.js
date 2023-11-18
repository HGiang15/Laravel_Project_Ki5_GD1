function showNotification(message, type) {
    // Lấy phần tử có id "notification" trong DOM
    var notification = document.getElementById("notification");
  
    // Thiết lập nội dung thông báo
    notification.textContent = message;
  
    // Thêm lớp CSS tương ứng với loại thông báo (success, error, warning)
    notification.classList.add(type);
    var icon;
    if (type === "success") {
      // Biểu tượng chữ tích từ Bootstrap-icon
      icon = '<i class="bi bi-check-circle me-2" style="font-size:20px;"></i>';
    } else if (type === "error") {
      // Biểu tượng chữ X từ Bootstrap-icon
      icon = '<i class="bi bi-x-circle me-2" style="font-size:20px;"></i>';
    } else if (type === "warning") {
      // Biểu tượng tam giác cảnh báo từ Bootstrap-icon
      icon = '<i class="bi bi-exclamation-triangle me-2" style="font-size:20px;"></i>';
    }
    else if (type === "infor") {
      // Biểu tượng thông tin từ Bootstrap-icon
      icon = '<i class="bi bi-info-circle me-2" style="font-size:20px;"></i>';
    }
    // Hiển thị phần tử thông báo
    notification.innerHTML = '<span>'+icon + message+'</span>';
    
    notification.style.display="flex";
    // Thiết lập thời gian tự động ẩn thông báo sau 4 giây
    setTimeout(function() {
      hideNotification();
    }, 4000);
  }
  
  function hideNotification() {
    // Lấy phần tử có id "notification" trong DOM
    var notification = document.getElementById("notification");
    notification.classList.add("notification-hidden");
  
    setTimeout(function() {
      notification.style.display = "none";
      notification.classList.remove("notification-hidden");
    }, 1000);
  
    // Xóa các lớp CSS success, error, warning khỏi phần tử thông báo
    notification.classList.remove("success", "error", "warning");
  }
  // Khi trang web được tải hoàn thành (DOMContentLoaded)
  document.addEventListener("DOMContentLoaded", function() {
    // Tạo phần tử span để làm nút đóng thông báo
    var closeButton = document.createElement("span");
    closeButton.innerHTML = "<i class='bi bi-x-lg' style='font-size:20px;'></i>";
    closeButton.classList.add("close-button");
  
    // Thêm sự kiện click cho nút đóng thông báo
    closeButton.addEventListener("click", function() {
      hideNotification();
    });
  
    // Lấy phần tử thông báo trong DOM
    var notification = document.getElementById("notification");
  
    // Thêm nút đóng vào phần tử thông báo
    notification.appendChild(closeButton);
  });